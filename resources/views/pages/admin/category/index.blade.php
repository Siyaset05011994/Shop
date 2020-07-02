@extends('layouts.admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                    <div class="add-button-div float-left">
                                        <a href="{{route('admin.category.create')}}" class="btn btn-success float-left"><i class="fa fa-plus"></i></a>
                                    </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Parent Id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->parent_id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->status}}</td>
                                            <td>

                                                @if($category->parameter_exists==1)
                                                    <a class="btn btn-success btn-sm admin-btn operation-btns" href="{{route('admin.category.getAddRemoveParametr',$category->id)}}">
                                                        <i class="fa fa-plus"></i>
                                                        Parametr əlavə et(sil)
                                                    </a>
                                                @endif

{{--                                                <a class="btn btn-info btn-sm admin-btn operation-btns" href="{{route('admin.category.edit',$category->id)}}">--}}
{{--                                                    <i class="fa fa-pencil"></i>--}}
{{--                                                </a>--}}

{{--                                                <form class="operation-btns" action="{{route('admin.category.destroy',$category)}}" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" onclick="return confirm('Silmək istədiyinizdən əminsiniz ?');" value="Delete" class="admin-btn btn btn-danger btn-sm">--}}
{{--                                                        <i class="fa fa-trash">--}}
{{--                                                            </i>--}}
{{--                                                    </button>--}}
{{--                                                </form>--}}

                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
