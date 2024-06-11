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
