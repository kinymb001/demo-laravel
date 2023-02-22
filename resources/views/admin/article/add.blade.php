@extends('layouts.admin')

@section('title')
    <title>
        Add tags
    </title>
@endsection

@section('body')
    <div class="content-wrapper">
        <x-breadcrumb name="Add article" />


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
                                <form class="col-8" action="{{ route('articles.store') }}" method="post"
                                    autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên bài viết:</label>
                                            <input type="text" class="form-control" name="name"
                                                id="exampleInputEmail1" placeholder="VD : tin thể thao, ...">
                                            <small class="text-danger"> {{ $errors->first('name') ?? '' }} </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ảnh:</label>
                                            <input type="file" class="form-control" name="image" accept="image/*"
                                                id="exampleInputEmail1" required>
                                            <small class="text-danger"> {{ $errors->first('image') ?? '' }} </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Danh mục bài viết:</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger"> {{ $errors->first('category') ?? '' }} </small>
                                        </div>
                                        <div class="form-group select-select2">
                                            <label for="exampleInputEmail1">Tags:</label>
                                            <select name="tag[]" class="select2-danger form-control select2 select2-ajax-tags" multiple id="tag_search" data-url="{{route("tags.search")}}">
                                                {{-- @foreach ($keywords as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach --}}
                                            </select>
                                            <small class="text-danger"> {{ $errors->first('tag') ?? '' }} </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mô tả:</label>
                                            <textarea class="form-control" name="description"></textarea>
                                            <small class="text-danger"> {{ $errors->first('description') ?? '' }} </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nội dung:</label>
                                            <textarea id="compose-textarea" class="form-control" name="content"></textarea>
                                            <small class="text-danger"> {{ $errors->first('content') ?? '' }} </small>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Thêm</button>
                                    </div>
                                </form>
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
