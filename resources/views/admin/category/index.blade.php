@extends('layouts.admin')

@section('title')
    <title>
        {{ __('messages.categories.title') }}
    </title>
    <meta name="description" content="Cao Sơn" />
    <meta name="keywords" content="Cao Sơn">
    <meta name="author" content="Cao Sơn" />
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Categories" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            @livewire('categories-livewire')

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
