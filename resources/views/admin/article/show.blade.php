@extends('layouts.admin')

@section('title')
    <title>
        Show srticles {{ $data->name }}
    </title>
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Detail blog" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body row">
                                <table class="table" style="width: 950px;">
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <a class="btn btn-warning" href="{{ route('articles.edit', $data->id) }}"
                                                    data-tippy-content="{{ __('messages.edit', ['name' => $data->name]) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('articles.destroy', $data->id) }}"
                                                    data-tippy-content="{{ __('messages.delete', ['name' => $data->name]) }}"
                                                    class="d-inline delete" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Id: </td>
                                            <td>{{ $data->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Title: </td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Image: </td>
                                            <td>
                                                <img style="width: 200px; height: 200px;"
                                                    class="img-fluid img-thumbnail lazyload"
                                                    src="{{ asset('assets/images/articles/' . $data->image) }}"
                                                    alt="{{ $data->name }}"
                                                    data-src="{{ asset('assets/images/articles/' . $data->image) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Category: </td>
                                            <td>
                                                <a href="{{ route('categories.show', ['category' => $data->category->id]) }}"
                                                    class="">
                                                    {{ $data->category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tags: </td>
                                            <td>
                                                @foreach ($data->tags as $value)
                                                    <a href="{{ route('tags.show', $value->id) }}"
                                                        class="badge badge-info me-1">{{ $value->name }}</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>User: </td>
                                            <td>
                                                <a href="{{ route('users.show', $data->user->id) }}" class="">
                                                    {{ $data->user->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Slug: </td>
                                            <td>{{ $data->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td>View: </td>
                                            <td>{{ $data->view }}</td>
                                        </tr>
                                        <tr>
                                            <td>Description: </td>
                                            <td>{{ $data->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Created_at: </td>
                                            <td>{{ date_format($data->created_at, 'H:i:s d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Updated_at: </td>
                                            <td>{{ date_format($data->updated_at, 'H:i:s d/m/Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="col-10 content">
                                    <div class="w-100">
                                        {!! $data->content !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
