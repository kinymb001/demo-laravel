@extends('layouts.client')

@section('title')
    <title>
        {{ __('messages.home') }}
    </title>
    <meta name="description" content="Cao Sơn" />
    <meta name="keywords" content="Cao Sơn">
    <meta name="author" content="Cao Sơn" />
@endsection

@section('body')
    <div class="container">
        <div class="m-t-10"></div>
        <section class="banner">
            <div>
                <a class="p-r" href="">
                    <img class="w-100" src="{{ asset('client/images/banner/img.png') }}">
                    <div class="p-a text-banner">
                        <div>
                            <img class="w-50 " src="{{ asset('client/images/banner/review.png') }}">
                        </div>
                        <div>
                            <img class="w-50 " src="{{ asset('client/images/banner/subre.png') }}">
                        </div>
                    </div>
                </a>
            </div>
        </section>

        <section class="main-container">

            <div>
                <ul class="category d-flex justify-content-between">
                    <li>
                        <a class="active" href="index.html">
                            Tất cả
                        </a>
                    </li>
                    <li>
                        <a href="category.html">
                            Xã hội
                        </a>
                    </li>
                    <li>
                        <a href="">
                            Nhà đất
                        </a>
                    </li>
                    <li class="d-none-mobile">
                        <a href="">
                            Đời sống
                        </a>
                    </li>
                    <li class="d-none-mobile">
                        <a href="">
                            Video
                        </a>
                    </li>
                </ul>
            </div>
            <div class="list-news-m">
                <div class="d-flex justify-content-center">
                    <a href="" class="d-flex align-items-center">
                        <img class="w-list-category" src="{{ asset('client/images/icons/list.png') }}">
                    </a>
                    <p class="p-2">Tin Tức</p>
                </div>
            </div>
            <div class="row">
                <div class="news-item transition col-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="img-news p-r">
                        <a href="article.html">
                            <img src="{{ asset('client/images/news/main-new.png') }}">
                        </a>
                        <span class="p-a add-like">
                            <a href="">
                                <i class="fas fa-heart"></i>
                            </a>
                        </span>
                    </div>
                    <a href="article.html">
                        <p class="title-news">Making a Housing Wage: Where Teachers, First Responders and Restaurant Workers
                            Can Live Where They Work</p>
                    </a>
                    <div class="m-t-b-1">
                        <span class="address-news">
                            <a href="">Xã hội</a>
                        </span>
                        <span>.</span>
                        <span class="user-name-news">
                            Cao Văn Sơn
                        </span>
                        <span>.</span>
                        <span class="date-news">
                            11/22/2022
                        </span>
                    </div>
                    <div class="title-description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum porta
                        sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-2 col-xl-2 transition row">
                    <div class="col-12 col-md-6">
                        <div class="news-item m-b-2 transition">
                            <div class="img-news p-r">
                                <a href="article.html">
                                    <img src="{{ asset('client/images/news/news-1.png') }}">
                                </a>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                            </div>
                            <a href="article.html">
                                <p class="title-news">Making a Housing Wage: Where Restaurant Workers Can They Work</p>
                            </a>
                            <div class="m-t-b-1">
                                <span class="address-news">
                                    <a href="">Xã hội</a>
                                </span>
                                <span>.</span>
                                <span class="user-name-news">
                                    Cao Văn Sơn
                                </span>
                                <span>.</span>
                                <span class="date-news">
                                    11/22/2022
                                </span>
                            </div>
                            <div class="title-description d-none d-block-md">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum
                                porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="news-item m-b-2 transition">
                            <div class="img-news p-r">
                                <a href="article.html">
                                    <img src="{{ asset('client/images/news/new-2.png') }}">
                                </a>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                            </div>
                            <a href="article.html">
                                <p class="title-news">Making a Housing Wage: Where Restaurant Workers Can They Work</p>
                            </a>
                            <div class="m-t-b-1">
                                <span class="address-news">
                                    <a href="">Xã hội</a>
                                </span>
                                <span>.</span>
                                <span class="user-name-news">
                                    Cao Văn Sơn
                                </span>
                                <span>.</span>
                                <span class="date-news">
                                    11/22/2022
                                </span>
                            </div>
                            <div class="title-description d-none d-block-md">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit diam at feugiat purus, interdum
                                porta sed. Ac ut hendrerit enim et scelerisque nullam lorem. Libero mi velit id vitae...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="main-container videos">
            <div class="video-card">
                <div class="video-label">
                    <p class="video-lable-text p-b">Video</p>
                    <!-- <span class="video-label-next-icon"><i class="fas fa-chevron-right"></i></span> -->
                    <a href="">
                        <span class="video-label-see-all p-b">Xem Tất Cả</span>
                    </a>
                </div>
                <div class="list-video">
                    <!--  -->
                    <div class="video-main">
                        <div class="video-item video-item-main p-r">
                            <div class="video-poster p-r">
                                <img src="{{ asset('client/images/videos/video.png') }}" alt=""
                                    class="video-poster-img">
                                <div class="video-icon-container-pause">
                                    <img src="{{ asset('client/images/icons/pause.png') }}" alt=""
                                        class="video-icon_pause">
                                </div>

                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                                <!-- <img src="assets/images/icons/heart-white.png" alt="" class="video-icon_fav"> -->
                            </div>
                            <div class="video-desc">
                                <p class="video-desc-title">
                                    Đi dạo cạnh đường cao tốc Pháp Vân Cầu Giẽ ổn không?
                                </p>
                                <p class="video-number-view">
                                    <span class="number-view">5542 lượt xem . </span>
                                    <span class="cre_at"> 31/08/2022</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="list-video_sub">
                        <div class="video-item">
                            <div class="video-poster p-r">
                                <img src="{{ asset('client/images/videos/video.png') }}" alt=""
                                    class="video-poster-img">
                                <div class="video-icon-container-pause">
                                    <img src="{{ asset('client/images/icons/pause.png') }}" alt=""
                                        class="video-icon_pause">
                                </div>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                                <!-- <img src="assets/images/icons/heart-white.png" alt="" class="video-icon_fav"> -->
                            </div>
                            <div class="video-desc">
                                <p class="video-desc-title">
                                    Making a Housing Wage: Where Restaurant should l...
                                </p>
                                <p class="video-number-view">
                                    <span class="number-view">5542 lượt xem . </span>
                                    <span class="cre_at"> 31/08/2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="video-poster">
                                <img src="{{ asset('client/images/videos/video.png') }}" alt=""
                                    class="video-poster-img">
                                <div class="video-icon-container-pause">
                                    <img src="{{ asset('client/images/icons/pause.png') }}" alt=""
                                        class="video-icon_pause">

                                </div>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                                <!-- <img src="assets/images/icons/heart-white.png" alt="" class="video-icon_fav"> -->
                            </div>
                            <div class="video-desc">
                                <p class="video-desc-title">
                                    Making a Housing Wage: Where Restaurant should l... </p>
                                <p class="video-number-view">
                                    <span class="number-view">5542 luot xem . </span>
                                    <span class="cre_at"> 31/08/2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="video-poster">
                                <img src="{{ asset('client/images/videos/img.png') }}" alt=""
                                    class="video-poster-img">
                                <div class="video-icon-container-pause">
                                    <img src="assets/images/icons/pause.png" alt="" class="video-icon_pause">

                                </div>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                                <!-- <img src="assets/images/icons/heart-white.png" alt="" class="video-icon_fav"> -->
                            </div>
                            <div class="video-desc">
                                <p class="video-desc-title">
                                    Making a Housing Wage: Where Restaurant should l...
                                </p>
                                <p class="video-number-view">
                                    <span class="number-view">5542 lượt xem . </span>
                                    <span class="cre_at"> 31/08/2022</span>
                                </p>
                            </div>
                        </div>
                        <div class="video-item">
                            <div class="video-poster">
                                <img src="assets/images/videos/img_1.png" alt="" class="video-poster-img">
                                <div class="video-icon-container-pause">
                                    <img src="assets/images/icons/pause.png" alt="" class="video-icon_pause">
                                </div>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                                <!-- <img src="assets/images/icons/heart-white.png" alt="" class="video-icon_fav"> -->
                            </div>
                            <div class="video-desc">
                                <p class="video-desc-title">
                                    Making a Housing Wage: Where Restaurant should l...
                                </p>
                                <p class="video-number-view">
                                    <span class="number-view">5542 lượt xem . </span>
                                    <span class="cre_at"> 31/08/2022</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="main-container">
            <div class="post">
                <div>
                    <p class="p-b">Danh sách tin</p>
                </div>

                <div class="row">
                    @foreach ($posts as $value)
                        <div class="post-item row">
                            <div class="col-12 d-none d-block-md">
                                <a class="" href="{{ route('blogs', $value->slug) }}">
                                    <p class="title-news">{{ $value->name }}</p>
                                </a>
                                <div class="m-t-b-1 m-0-mb">
                                    <span class="address-news">
                                        <a href="">{{ $value->category->name }}</a>
                                    </span>
                                    <span>.</span>
                                    <span class="user-name-news">
                                        {{ $value->user->name }}
                                    </span>
                                    <span>.</span>
                                    <span class="date-news">
                                        {{ date_format($value->created_at, 'd/m/Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="img p-r col-6 col-lg-4 col-xl-4">
                                <a href="{{ route('blogs', $value->slug) }}">
                                    <img src="{{ asset('assets/images/articles/' . $value->image) }}">
                                </a>
                                <span class="p-a add-like">
                                    <a href="">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </span>
                            </div>
                            <div class="col-6 col-lg-8 col-xl-8">
                                <a class="d-none-mobile" href="{{ route('blogs', $value->slug) }}">
                                    <p class="title-news">{{ $value->name }}</p>
                                </a>
                                <div class="d-none-mobile m-t-b-1">
                                    <span class="address-news">
                                        <a href="">{{ $value->category->name }}</a>
                                    </span>
                                    <span>.</span>
                                    <span class="user-name-news">
                                        {{ $value->user->name }}
                                    </span>
                                    <span>.</span>
                                    <span class="date-news">
                                        {{ date_format($value->created_at, 'd/m/Y') }}
                                    </span>
                                </div>
                                <div class="title-description">
                                    {{ $value->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="m-t-b-4 d-flex justify-content-center">
                    <a class="btn-more" href="">
                        Xem thêm
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection
