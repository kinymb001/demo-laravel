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

        <section class="main-container">

            <div>
                <form action="{{ route('search') }}" method="get">
                    <div class="d-flex">
                        <input class="search" placeholder="serach ...." name="search" />
                        <button class="btn-news" type="submit">Search</button>
                    </div>
                </form>
            </div>

        </section>


        <section class="main-container">
            <div class="post">
                <div>
                    <p class="p-b">Danh sách tin</p>
                </div>

                <div class="row">
                    @foreach ($data as $value)
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
