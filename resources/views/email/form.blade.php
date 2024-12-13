@extends('layouts.app')
@section('content')
    <div class="readmore-container container mt-5">
        <h1 class="comment-heading">Contact Us</h1>
        <div class="space mt-5"></div>

        @session('success')
            <div class=" alert-success">
                Mail Sent
            </div>
        @endsession

        <div class="space mt-5"></div>

        <form class="" action="{{ route('contact-us.send') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <select name="subject" class="form-select" id="subject" aria-describedby="subject">
                    <option value="" selected>-- Select a Subject --</option>
                    <option value="Feedback" {{ old('subject') == 'Feedback' ? 'selected' : '' }}>Feedback</option>
                    <option value="Help" {{ old('subject') == 'Help' ? 'selected' : '' }}>Help</option>
                    <option value="Animal Suggestion" {{ old('subject') == 'Animal Suggestion' ? 'selected' : '' }}>Animal Suggestion</option>
                </select>
            </div>
            @error('subject')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    style="display: block; width: 100%; resize:none; padding: 10px"></textarea>
            </div>
            @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <input name="attachment[]" type="file" class="form-control" id="attachment" multiple>
            </div>
            @error('attachment.*')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @error('attachment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <section class="prewiew-attachment mb-3">
                @include('email.preview-attachment')
            </section>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="space mt-5"></div>
        <a href="{{ route('animals') }}" class="btn btn-dark">Back</a>
    </div>
@endsection
