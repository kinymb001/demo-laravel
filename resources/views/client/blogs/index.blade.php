@extends('layouts.client')

@section('title')
    <title>
        {{ $post->name }}
    </title>
    <meta name="description" content="{{ $post->description }}" />
    <meta name="keywords" content="Cao Sơn">
    <meta name="author" content="Cao Sơn" />
@endsection

@section('body')
    <div class="container">
        <div class="m-t-10"></div>

        <section class="main-container">
            <div class="dff">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <span>
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span>
                            <a class="back" href="{{ route('home') }}">Quay lại</a>
                        </span>
                    </div>
                    <div>
                        <span>Chuyên mục: </span>
                        <a class="btn-cate m-f-r" href="">{{ $post->category->name }}</a>
                    </div>
                </div>
            </div>

            <div class="content">
                <p class="title-post">
                    {{ $post->name }}
                </p>

                <div class="d-flex justify-content-between">
                    <div class="m-t-b-1 d-flex align-items-center">
                        <span class="address-news">
                            <a href="">{{ $post->category->name }}</a>
                        </span>
                        <span>.</span>
                        <span class="user-name-news">
                            {{ $post->user->name }}
                        </span>
                        <span>.</span>
                        <span class="date-news">
                            {{ date_format($post->created_at, 'd/m/Y') }}
                        </span>
                    </div>
                    <div class="m-t-b-1 w-c">
                        <a class="btn btn-mail" href="">
                            <i class="far fa-envelope"></i>
                            <span class="d-none-mobile1">Gửi mail</span>
                        </a>
                        <a class="btn btn-share" href="">
                            <i class="fab fa-facebook"></i>
                            <span class="d-none-mobile1">Chia sẻ</span>
                        </a>
                        <a class="btn btn-save" href="">
                            <i class="fas fa-heart"></i>
                            <span class="d-none-mobile1">Lưu</span>
                        </a>
                    </div>
                </div>

                <div class="img-post">
                    <img src="{{ asset('assets/images/articles/' . $post->image) }}">
                </div>

                <div class="p-content">
                    {!! $post->content !!}
                </div>

            </div>

            <div class="tag">
                @foreach ($post->tags as $value)
                    <a class="btn btn-tag" href="tag/{{ $value->slug }}"># {{ $value->name }}</a>
                @endforeach
            </div>

            <div class="post">
                <div class="d-flex justify-content-between mt-5">
                    <span class="p-b">Tin cùng chuyên mục <a class="btn-cate m-f-r" href="">Xã hội</a>

                    </span>
                    <a class="d-none  d-flex-m align-items-center" href="">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <span class="d-none-mobile1">
                        <a href="">Xem tất cả</a>
                    </span>
                </div>

                <div class="row">

                    @foreach ($post_same as $value)
                        <div class="post-item row">
                            <div class="col-12 d-none d-block-md">
                                <a class="" href="{{ route('blogs', $value->slug) }}">
                                    <p class="title-news">{{ $value->name }}</p>
                                </a>
                                <div class="m-t-b-1 m-0-mb">
                                    <span class="address-news">
                                        <a href="{{ route('blogs', $value->slug) }}">{{ $value->category->name }}</a>
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
            </div>

            <div class="post">
                <div class="d-flex justify-content-between mt-5">
                    <span class="p-b">Tin thịnh hành

                    </span>
                    <a class="d-none d-initial-mobile1" href="">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <span class="d-none-mobile1">
                        <a href="">Xem tất cả</a>
                    </span>
                </div>

                {{-- <div class="row">

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

                </div> --}}
            </div>


        </section>

    </div>
@endsection
