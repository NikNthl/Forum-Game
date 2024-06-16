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
                            <div class="card-header"><div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$question->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton{{$question->id}}">

                    <li>
                        <form method="POST" action="{{ route('questions.edit', ['id' => $question->id]) }}">
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
                                <input type="text" class="form-control" id="questionTags" name="tags" placeholder="Tags" required value="{{ $question->tags }}">
                                <label for="questionTags">Tags</label>
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
                    
                        <h2 class="fw-bolder mb-1">{{$question->title}}</h2>
                        <div class="text-muted fst-italic mb-2">Posted on: {{ date('Y-m-d') }}</div>    
                        </div>
                            
                            <div class="card-body">
                                <p class="card-text">{{ $question->question }}</p>
                                <div class="text-muted mb-1">Tags: {{$question->tags}}</div>
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
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search keywords" aria-label="Search..." aria-describedby="button-search">
                            <button class="btn btn-primary" type="button" id="button-search">Search</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Hot Topics</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">MLBB</a></li>
                                    <li><a href="#!">VALORANT</a></li>
                                    <li><a href="#!">PUBG</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">Eternal Return</a></li>
                                    <li><a href="#!">Ensemble Stars!!</a></li>
                                    <li><a href="#!">Wuthering Waves</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
