<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index(){
        return view('pages.home');
    }

    public function getAllDetail(){
        $animals = Animal::paginate(15);
        return view('animals.detail',['animals' => $animals]);
    }

    public function getFormat(String $format){
        if ($format == 'compact'){
            $animals = Animal::paginate(20);
            return view('animals.compact',['animals' => $animals]);
        }else if ($format == 'detail'){
            $animals = Animal::paginate(15);
            return view('animals.detail',['animals' => $animals]);
        }
    }

    public function getAnimal(Request $request, String $format){
        if($format === 'detail'){
            $animals = Animal::where('name', 'LIKE', '%'.$request->animalName.'%')->paginate(15);
            return view('animals.detail', ['animals' => $animals]);
        }else if($format === 'compact'){
            $animals = Animal::where('name', 'LIKE', '%'.$request->animalName.'%')->paginate(20);
            return view('animals.compact', ['animals' => $animals]);
        }
    }

    public function readMore(Animal $animal){
        $comments = Comment::where('animal_id', $animal->id)
        ->whereNull('parent_id')->orderBy('created_at','desc')->paginate(15);

        return view('pages.read-more', [
            'animal'=> $animal,
            'comments' => $comments,
            ]);
    }

    public function forum(String $filter){
        if ($filter === 'new') {
            $comments = Comment::whereNull('parent_id')->orderBy('created_at', 'desc')->paginate(15);
        } else if ($filter === 'old') {
            $comments = Comment::whereNull('parent_id')->orderBy('created_at', 'asc')->paginate(15);
        } else if ($filter === 'mostPopular') {
            $comments = Comment::whereNull('parent_id')->withCount('likes')->orderBy('likes_count', 'desc')->paginate(15);
        } else if ($filter === 'leastPopular') {
            $comments = Comment::whereNull('parent_id')->withCount('likes')->orderBy('likes_count', 'asc')->paginate(15);
        }
        
        // $comments = Comment::withCount('likes')->orderBy('likes_count', 'desc')->paginate(10);
        return view('animals.forum', [
            'comments' => $comments,
            'filter' => $filter
        ]);
    }

    public function addAnimal(Request $request){
        $user = Auth::user();

        if(! Gate::allows('isAdmin', $user)){
            abort(403);
        }

        $validate = $request->validate([
            'name' => ['required', 'unique:animals,name' ],
            'height' => ['required'],
            'weight' => ['required'],
            'color' => ['required'],
            'lifespan' => ['required'],
            'diet' => ['required'],
            'habitat' => ['required'],
            'predators' => ['required'],
            'avgspeed' => ['required'],
            'topspeed' => ['required'],
            'countries' => ['required'],
            'conservationStatus' => ['required'],
            'family' => ['required'],
            'gestationPeriod' => ['required'],
            'socialStructure' => ['required'],
            'image' => ['required', 'mimes:jpg'],
            'description' => ['required']
        ]);

        
        $fileName = 'animals/' . $validate['name'] . '.' .$request->file('image')->getClientOriginalExtension();
        $filePath = str_replace("'", "_", $fileName);
        
        // dd($request->file('image'), $request, $fileName);

        Storage::disk('google')->put($fileName, File::get($request->file('image')), 'public');

        $downloadableUrl = Storage::cloud()->url($filePath);

        if (preg_match('/id=([a-zA-Z0-9_-]+)/', $downloadableUrl, $matches)) {
            $fileId = $matches[1];
            $url = 'https://drive.google.com/thumbnail?id=' . $fileId . '&sz=w1000';
        }

        Animal::create([
            'name' => $validate['name'],
            'height' => $validate['height'],
            'weight' => $validate['weight'],
            'color' => $validate['color'],
            'lifespan' => $validate['lifespan'],
            'diet' => $validate['diet'],
            'habitat' => $validate['habitat'],
            'predators' => $validate['predators'],
            'avgspeed' => $validate['avgspeed'],
            'topspeed' => $validate['topspeed'],
            'countries' => $validate['countries'],
            'conservationStatus' => $validate['conservationStatus'],
            'family' => $validate['family'],
            'gestationPeriod' => $validate['gestationPeriod'],
            'socialStructure' => $validate['socialStructure'],
            'image' => $url,
            'description' => $validate['description']
        ]);

        return redirect()->route('add.animal')->with('success', true);
    }

    public function delete(Animal $animal){
        $user = Auth::user();

        if(! Gate::allows('isAdmin', $user)){
            abort(403);
        }

        $filePath = '/animals/' . str_replace("'", "_", $animal->name) . '.jpg';
        Storage::cloud()->delete($filePath);
        // unlink(public_path($animal->image));
        $animal->delete();

        return back()->with('deleted',true);
    }
}
