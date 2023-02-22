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
        <x-breadcrumb name="Detaild log" />

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
                                            <th>Date</th>
                                            <th>ENV</th>
                                            <th>Type</th>
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
                                            @foreach ($data as $key => $value)
                                                <tr>
                                                    <td>{{ $value['date'] }}</td>
                                                    <td>{{ $value['folder'] }}</td>
                                                    <td><span class="{{ $value['class'] }}">{{ $value['type'] }}</span></td>
                                                    <td>
                                                        <div class="text-center">
                                                            <button class="btn btn-primary" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#collapse{{ $key }}"
                                                                aria-expanded="false"
                                                                aria-controls="collapse{{ $key }}">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" class="p-0">
                                                        <div class="collapse" id="collapse{{ $key }}">
                                                            <div class="card card-body">
                                                                <p>{!! $value['text'] !!}</p>
                                                            </div>
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
