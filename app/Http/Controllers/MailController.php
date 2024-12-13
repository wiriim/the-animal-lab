<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Rules\AttachmentSize;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendMail(Request $request) {
        $validation = $request->validate([
            'subject' => 'required|in:Feedback, Help, Animal Suggestion',
            'description' => 'required|max:1200',
            'attachment.*' => 'mimes:jpg,jpeg,png,pdf',
            'attachment' => ['bail', new AttachmentSize(5)],
        ], [
            'subject.in' => 'The selected subject is invalid. Please choose a valid option.',
            'attachment.*.mimes' => 'Each attachment must be a file of type: jpg, jpeg, png, pdf.',
        ]);
    
        if ($request->hasFile('attachment')) {
            $data = [
                'subject' => $validation['subject'],
                'description' => $validation['description'],
                'attachment' => $validation['attachment'],
            ];
        } else {
            $data = [
                'subject' => $validation['subject'],
                'description' => $validation['description']
            ];
        }
        
        Mail::to('medy.gunawan@binus.ac.id')->send(new UserMail(Auth::user()->email, $data));
        
        return back()->with('success', true);
    }
}
