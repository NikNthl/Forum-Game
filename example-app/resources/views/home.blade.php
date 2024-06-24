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
                                    <div class="dropdown float-end">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$question->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                            ...
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$question->id}}">
                                            <li>
                                                <form method="POST" action="{{ route('questions.edit', ['id' => $question->id]) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="questionTitle" name="title" placeholder="Title" required value="{{ $question->title }}">
                                                        <label for="questionTitle">Title</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" id="questionDetails" name="question" placeholder="Describe your question in detail" style="height: 150px;" required>{{ $question->question }}</textarea>
                                                        <label for="questionDetails">Question Details</label>
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
                                                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
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
                                <h2 class="fw-bolder mb-1">{{ $question->title }}</h2>
                                <div class="text-muted fst-italic mb-2">Posted by: {{ $question->user->username }} on {{ date('Y-m-d', strtotime($question->created_at)) }}</div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $question->question }}</p>
                                @if($question->image)
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('storage/public/' . $question->image) }}" alt="{{ $question->title }}" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                    </div>
                                @endif
                                <div class="text-muted mb-1">Tags: {{ $question->tags }}</div>
                                <form method="POST" action="{{ route('questions.like', $question->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm">Upvote ({{ $question->likes->count() }})</button>
                                </form>
                                <form method="POST" action="{{ route('questions.dislike', $question->id) }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Downvote ({{ $question->dislikes->count() }})</button>
                                </form>
                            </div>
                            @if($question->answers->count() > 0)
                                <div class="card-footer">
                                    <h5 class="fw-bolder mb-3">Answers:</h5>
                                    @foreach($question->answers as $answer)
                                        <div class="mb-2">
                                            <div class="d-flex justify-content-between">
                                                <div class="text-muted fst-italic">
                                                    {{ $answer->user->username }} answered on {{ date('Y-m-d', strtotime($answer->created_at)) }}
                                                </div>
                                                @if(auth()->user() && $answer->user_id == auth()->user()->id)
                                                    <div class="dropdown float-end">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$answer->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                                            ...
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$answer->id}}">
                                                            <li>
                                                                <form method="POST" action="{{ route('answers.edit', ['id' => $answer->id]) }}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-floating mb-3">
                                                                        <textarea class="form-control" id="answerDetails" name="answers" placeholder="Edit your answer" style="height: 150px;" required>{{ $answer->answers }}</textarea>
                                                                        <label for="answerDetails">Edit your answer</label>
                                                                    </div>
                                                                    <div class="d-grid">
                                                                        <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                                                    </div>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('answers.delete', $answer->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-block" onclick="return confirm('Are you sure you want to delete this answer?')">Delete</button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <p class="mb-0">{{ $answer->answers }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            @auth
                                <div class="card-footer">
                                    <h5 class="fw-bolder mb-3">Submit your answer:</h5>
                                    <form method="POST" action="{{ route('answers.store') }}">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <textarea class="form-control" name="answers" rows="3" placeholder="Write your answer here" required></textarea>
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Answer</button>
                                    </form>
                                </div>
                            @endauth
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
