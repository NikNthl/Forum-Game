@extends('template')

@section('title')
    PIMPAN
@endsection

@section('content')
@include('menu')
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="https://pbs.twimg.com/media/FvVx9smaIAA-oVF.jpg:large" alt="Tatsumi" /></a>
                        <div class="card-body">
                            <div class="small text-muted">January 1, 2023</div>
                            <h2 class="card-title">Tatsumi kok bisa cakep banget ya?!</h2>
                            <p class="card-text">Tatsumi Kazehaya the loml </p>
                            <a class="btn btn-primary" href="#!">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://i.pinimg.com/736x/5c/c7/bf/5cc7bf9ebcd3f22700f966d24051d800.jpg" width = 700 length = 300  alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Paquita istri Tatsumi?!</h2>
                                    <p class="card-text">OMGGGG GUA NIKAH AMA HUSBU GAME GUA?! SHOCKING!!</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://i.pinimg.com/736x/bd/79/52/bd79529792197c74ad2c8f925b9ec3ee.jpg" width = 700 length = 300 alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">Tatsumi FS2 announcement</h2>
                                    <p class="card-text">BROOO TATSUMI FS2 JUST DROPPED AND I DONT HAVE ANY DIAS LEFT NAURRRRR</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://i.pinimg.com/564x/d0/fc/c3/d0fcc357f327751c552b362132b529d7.jpg" width = 700 length = 300 alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">emang bole seperfect ini?!</h2>
                                    <p class="card-text">katanya di dunia gaada yang sempurna tapi ini ada kok di depan mata</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="https://i.pinimg.com/564x/02/76/d8/0276d821caa8b8964162b0e21dfc30b4.jpg" width = 700 length = 300 alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">January 1, 2023</div>
                                    <h2 class="card-title h4">GW NAKSIRR</h2>
                                    <p class="card-text">gue naksir banget SENAKSIR itu. sangat amat NAKSIR! ini kalo ketauan pemerintah pasti rasa naksir gue dijadiin PEMBANGKIT LISTRIK TENAGA NAKSIR</p>
                                    <a class="btn btn-primary" href="#!">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search keywords" aria-label="Search..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
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
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
</html>
@endsection