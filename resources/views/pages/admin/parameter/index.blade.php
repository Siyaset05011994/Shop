@extends('layouts.admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Parameters</h1>
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
                                        <a href="{{route('admin.parameter.create')}}" class="btn btn-success float-left"><i class="fa fa-plus"></i></a>
                                    </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($parameters as $parameter)
                                        <tr>
                                            <td>{{$parameter->id}}</td>
                                            <td>{{$parameter->name}}</td>
                                            <td>{{$parameter->type}}</td>
                                            <td>{{$parameter->status}}</td>
                                            <td>

{{--                                                @can('changeStatus-blog')--}}
{{--                                                    <a href="{{route('admin.blogs.changeStatus',$parameter)}}"  class="btn btn-{{$parameter->status==0?'danger':'success'}} float-left btn-sm admin-btn" >--}}
{{--                                                        <i class="fa fa-{{$parameter->status==0?'check':'power-off'}}"></i>--}}
{{--                                                    </a>--}}
{{--                                                @endcan--}}

                                                {{--                                                @if(in_array($user->role()->first()->id,$permittedRoleIds))--}}
                                                    <a class="btn btn-info btn-sm admin-btn" href="{{route('admin.parameter.edit',$parameter->id)}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
{{--                                                @endif--}}

{{--                                                @can('delete-blog')--}}
                                                    <form action="{{route('admin.parameter.destroy',$parameter)}}" method="POST" class="float-left">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Silmək istədiyinizdən əminsiniz ?');" value="Delete" class="admin-btn btn btn-danger btn-sm">
                                                            <i class="fa fa-trash">
                                                            </i>
                                                        </button>
                                                    </form>
{{--                                                @endcan--}}


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
