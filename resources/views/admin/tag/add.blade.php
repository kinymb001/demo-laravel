@extends('layouts.admin')

@section('title')
<title>
    Add tags
</title>
@endsection

@section('body')

<div class="content-wrapper">
    <x-breadcrumb name="Add tags" />

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
                          <form class="col-8" action="{{route('tags.store')}}" method="post">
                                @csrf
                              <div class="">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Tên từ khóa:</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="VD : tin thể thao, ...">
                                    <small class="text-danger"> {{ $errors->first('name') ?? '' }} </small>
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