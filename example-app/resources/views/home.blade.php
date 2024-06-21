@extends('template')

@section('title', 'PIMPAN')

@section('content')
    @include('menu')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if(isset($questions) && count($questions) > 0)
                    @foreach($questions as $question)
                        <div class="card mb-4">
                            <div class="card-header">
                                @if(auth()->user() && $question->user_id == auth()->user()->id)
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton{{$question->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton{{$question->id}}">
                                            <li>
                                            <form method="POST" action="{{ route('questions.edit', ['id' => $question->id]) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="questionTitle" name="title" placeholder="Title" required value="{{ $question->title }}">
                                                <label for="floatingInput">Title</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="questionDetails" name="question" placeholder="Describe your question in detail" style="height: 150px;" required>{{ $question->question }}</textarea>
                                                <label for="questionDetails"><small class="form-text text-muted">Enter your question details here.</small></label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="questionTags" name="tags" placeholder="Tags" value="{{ $question->tags }}">
                                                <label for="questionTags">Tags</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="file" class="form-control" id="questionImage" name="image" placeholder="Image">
                                                <label for="questionImage">Image</label>
                                            </div>
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-outline-primary btn-sm" value="Update">
                                            </div>
                                            </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('questions.delete', $question->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-block" onclick="return confirm('Are you sure you want to delete this question?')">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                <h2 class="fw-bolder mb-1">{{$question->title}}</h2>
                                <div class="text-muted fst-italic mb-2">Posted by: {{ $question->user->username }} on {{ date('Y-m-d', strtotime($question->created_at)) }}</div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $question->question }}</p>
                                <div class="text-muted mb-1">Tags: {{$question->tags}}</div>
                                <form method="POST" action="{{ route('questions.like', $question->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm">Upvote ({{ $question->likes->count() }})</button>
                                </form>
                                <form method="POST" action="{{ route('questions.dislike', $question->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Downvote ({{ $question->dislikes->count() }})</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info" role="alert">
                        No questions available.
                    </div>
                @endif
            </div>
            <div class="col-lg-4">
                @include('search')
            </div>
        </div>
    </div>
@endsection
