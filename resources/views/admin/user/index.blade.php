@extends('layouts.admin')

@section('title')
    <title>
        Users
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Users" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            @livewire('users-livewire')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
