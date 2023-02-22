@extends('layouts.admin')

@section('title')
<title>
    {{ __("messages.tags.edit", ["name" => "hello"])}}
</title>
@endsection

@section('body')

<div class="content-wrapper">
    <x-breadcrumb name="Edit categories" />

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
                          <form class="col-8" action="{{route('categories.update',["category" => $data->id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="">
                                    <div class="form-group">
                                        <label>Id:</label>
                                        <input type="text" class="form-control" disabled value="{{ $data->id }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục:</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="VD : tin thể thao, ..." value="{{ $data->name }}">
                                        <small class="text-danger"> {{ $errors->first('name') ?? '' }} </small>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả:</label>
                                        <textarea class="form-control" name="description" >{{$data->description}}</textarea>
                                        <small class="text-danger"> {{ $errors->first('description') ?? '' }} </small>
                                      </div>
                                  
                                  <button type="submit" class="btn btn-primary">Xác nhận sửa</button>
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