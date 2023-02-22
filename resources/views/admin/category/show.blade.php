@extends('layouts.admin')

@section('title')
    <title>
        Show category {{ $data->name }}
    </title>
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Show category" />

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
                                <table class="table" style="width: 650px;">
                                    <tbody>
                                        <tr>
                                            <td>Id: </td>
                                            <td>{{ $data->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Name: </td>
                                            <td>{{ $data->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Slug: </td>
                                            <td>{{ $data->slug }}</td>
                                        </tr>
                                        <tr>
                                            <td>Articles: </td>
                                            <td>{{ $data->articles_count }}</td>
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
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <a class="btn btn-warning" href="{{ route('categories.edit', $data->id) }}"
                                                    data-tippy-content="{{ __('messages.edit', ['name' => $data->name]) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="{{ route('tags.destroy', $data->id) }}"
                                                    data-tippy-content="{{ __('categories.delete', ['name' => $data->name]) }}"
                                                    class="d-inline delete" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fas fa-trash-alt"></i>  Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
