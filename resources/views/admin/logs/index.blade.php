@extends('layouts.admin')


@section('title')
    <title>
        {{ __('messages.admin.home') }}
    </title>
    <meta name="description" content="Cao Sơn" />
    <meta name="keywords" content="Cao Sơn">
    <meta name="author" content="Cao Sơn" />
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Logs" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>

                            <div class="table-responsive">
                                <table class="mt-3 mb-3 table table-hover table-border">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>File Size</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($data) == 0)
                                            <tr>
                                                <td colspan="6" class="text-center bg-info">
                                                    No results found ...
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($data as $value)
                                                <tr>
                                                    <td>{{ $value['file_name'] }}</td>
                                                    <td>{{ $value['file_size'] }}</td>
                                                    <td>
                                                        <div class="text-center">
                                                            <a class="btn btn-success"
                                                                href="{{ route('admin.log.show', $value['file_name']) }}">
                                                                Details
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

@endsection
