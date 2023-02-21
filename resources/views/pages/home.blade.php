@extends('layout')
@section('SEASON')
<section class="home">
        <!-- home bg -->
        <div class="owl-carousel home__bg">
            <div class="item home__cover" data-bg="img/home/home__bg.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg2.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg3.jpg"></div>
            <div class="item home__cover" data-bg="img/home/home__bg4.jpg"></div>
        </div>
        <!-- end home bg -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="home__title">Mới nhất</h1>
                    <button class="home__nav home__nav--prev" type="button">
                        <i class="icon ion-ios-arrow-round-back"></i>
                    </button>
                    <button class="home__nav home__nav--next" type="button">
                        <i class="icon ion-ios-arrow-round-forward"></i>
                    </button>
                </div>
                <style>
                    .card__cover {
                        position: relative;
                    }

                    .sotap {
                        position: absolute;
                        justify-content: left;
                        top: 2.5%;
                        left: 15%;
                        /*width: 20%;
                        height: 5%;*/
                        transform: translate(-50%, -50%);
                        background-color: red;
                        color: white;
                        margin: 5px;
                        font-size: 15px;
                        text-align: center;
                    }
                </style>
                <div class="col-12">
                    <div class="owl-carousel home__carousel">
                        @foreach($newMovie as $key =>$newmovie)
                        <div class="item" id="slide_film">
                            <!-- card -->
                            <div class="card card--big"> 
                                                 
                                <div class="card__cover">
                                <img src="{{asset('uploads/movie/'.$newmovie->image)}}" alt="">
                                <a href="{{route('detail',$newmovie->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                </a>
                            </div>

                                <div class="card__content">
                                    <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$newmovie->title}} {{isset($newmovie->season)? 'PHẦN '.$newmovie->season: ''}}</a></h3>
                                    <span class="card__category">
                                        <a href="#">{{$newmovie->category->title}}</a>
                                        <a href="#">{{$newmovie->genre->title}}</a>
                                    </span>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
    </section>
    <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">phim đề xuất</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">vừa cập nhật</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">phim bộ</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">anime</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="New items">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">NEW RELEASES</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">MOVIES</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">TV SERIES</a></li>

                                    <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">CARTOONS</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($newMovie as $key =>$newmovie)
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('uploads/movie/'.$newmovie->image)}}" alt="">
                                            <a href="{{route('detail',$newmovie->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>

                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$newmovie->title}} {{isset($newmovie->season)? 'PHẦN '.$newmovie->season: ''}}</a></h3>
                                            <span class="card__category">
                                                <a href="#">{{$newmovie->category->title}}</a>
                                                <a href="#">{{$newmovie->genre->title}}</a>
                                            </span>

                                            <div class="card__wrap">

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$newmovie->description}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($allMovie as $key =>$allmovie)
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{asset('uploads/movie/'.$allmovie->image)}}" alt="">
                                    <a href="{{route('detail',$allmovie->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$allmovie->title}} {{isset($allmovie->season)? 'PHẦN '.$allmovie->season: ''}}</a></h3>
                                    <span class="card__category">
                                        <a href="#">{{$allmovie->title}}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        @endforeach
                        <!-- card -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($phimbo as $key =>$phimbo)
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{asset('uploads/movie/'.$phimbo->image)}}" alt="">
                                    <a href="{{route('detail',$phimbo->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$phimbo->title}} {{isset($phimbo->season)? 'PHẦN '.$phimbo->season: ''}}</a></h3>
                                    <span class="card__category">
                                       >
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end card -->
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($anime as $key =>$anime)
                        <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                            <div class="card">
                                <div class="card__cover">
                                    <img src="{{asset('uploads/movie/'.$anime->image)}}" alt="">
                                    <a href="{{route('detail',$anime->slug)}}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
                                </div>
                                <div class="card__content">
                                    <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$anime->title}}{{isset($anime->season)? 'PHẦN '.$anime->season: ''}}</a></h3>
                                    <span class="card__category">
                                       
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </section>
        <section class="content">
        <div class="content__head">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- content title -->
                        <h2 class="content__title">top phim</h2>
                        <!-- end content title -->

                        <!-- content tabs nav -->
                        <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="true">theo ngày</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-21" role="tab" aria-controls="tab-21" aria-selected="false">theo tuần</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-31" role="tab" aria-controls="tab-31" aria-selected="false">theo tháng</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-41" role="tab" aria-controls="tab-41" aria-selected="false">theo năm</a>
                            </li>
                        </ul>
                        <!-- end content tabs nav -->

                        <!-- content mobile tabs nav -->
                        <div class="content__mobile-tabs" id="content__mobile-tabs">
                            <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <input type="button" value="New items">
                                <span></span>
                            </div>

                            <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-11" role="tab" aria-controls="tab-11" aria-selected="true">theo ngày</a></li>

                                    <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-21" role="tab" aria-controls="tab-21" aria-selected="false">theo tuần</a></li>

                                    <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-31" role="tab" aria-controls="tab-31" aria-selected="false">theo tháng</a></li>

                                    <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-41" role="tab" aria-controls="tab-41" aria-selected="false">theo năm</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end content mobile tabs nav -->
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- content tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-11" role="tabpanel" aria-labelledby="1-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($ngay as $key =>$ngay)
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('uploads/movie/'.$ngay->image)}}" alt="">
                                            <a href="{{route('detail',$ngay->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$ngay->title}} {{isset($ngay->season)? 'PHẦN '.$ngay->season: ''}}</a></h3>
                                            <span class="card__category">
                                                <a href="#">{{$ngay->category->title}}</a>
                                                <a href="#">{{$ngay->genre->title}}</a>
                                            </span>

                                            <div class="card__wrap">

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$ngay->description}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="tab-pane fade" id="tab-21" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($tuan as $key =>$tuan)
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('uploads/movie/'.$tuan->image)}}" alt="">
                                            <a href="{{route('detail',$tuan->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$tuan->title}}{{isset($tuan->season)? 'PHẦN '.$tuan->season: ''}}</a></h3>
                                            <span class="card__category">
                                                <a href="#">{{$tuan->category->title}}</a>
                                                <a href="#">{{$tuan->genre->title}}</a>
                                            </span>

                                            <div class="card__wrap">

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$tuan->description}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- card -->
                    </div>
                </div>
                 <div class="tab-pane fade" id="tab-31" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($thang as $key =>$thang)
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('uploads/movie/'.$thang->image)}}" alt="">
                                            <a href="{{route('detail',$thang->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$thang->title}}{{isset($thang->season)? 'PHẦN '.$thang->season: ''}}</a></h3>
                                            <span class="card__category">
                                                <a href="#">{{$thang->category->title}}</a>
                                                <a href="#">{{$thang->genre->title}}</a>
                                            </span>

                                            <div class="card__wrap">

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$thang->description}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- card -->
                    </div>
                </div>
                 <div class="tab-pane fade" id="tab-41" role="tabpanel" aria-labelledby="2-tab">
                    <div class="row">
                        <!-- card -->
                        @foreach($nam as $key =>$nam)
                        <div class="col-6 col-sm-12 col-lg-6">
                            <div class="card card--list">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="card__cover">
                                            <img src="{{asset('uploads/movie/'.$nam->image)}}" alt="">
                                            <a href="{{route('detail',$nam->slug)}}" class="card__play">
                                                <i class="icon ion-ios-play"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="card__content">
                                            <h3 class="card__title" style="margin-top: 5px"><a href="#">{{$nam->title}}{{isset($nam->season)? 'PHẦN '.$nam->season: ''}}</a></h3>
                                            <span class="card__category">
                                                <a href="#">{{$nam->category->title}}</a>
                                                <a href="#">{{$nam->genre->title}}</a>
                                            </span>

                                            <div class="card__wrap">

                                                <ul class="card__list">
                                                    <li>HD</li>
                                                    <li>16+</li>
                                                </ul>
                                            </div>

                                            <div class="card__description">
                                                <p>{{$nam->description}}.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- card -->
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </section>

        <section class="section">
        <div class="container">
            <div class="row">
                <!-- section title -->
                <div class="col-12">
                    <h2 class="section__title section__title--no-margin">Our Partners</h2>
                </div>
                <!-- end section title -->

                <!-- section text -->
                <div class="col-12">
                    <p class="section__text section__text--last-with-margin">It is a long <b>established</b> fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using.</p>
                </div>
                <!-- end section text -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/themeforest-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/audiojungle-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/codecanyon-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/photodune-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/activeden-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->

                <!-- partner -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                    <a href="#" class="partner">
                        <img src="img/partners/3docean-light-background.png" alt="" class="partner__img">
                    </a>
                </div>
                <!-- end partner -->
            </div>
        </div>
    </section>
@endsection