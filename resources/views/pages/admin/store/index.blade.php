@extends('layouts.admin.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stores</h1>
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
                                        <a href="{{route('admin.store.create')}}" class="btn btn-success float-left"><i class="fa fa-plus"></i></a>
                                    </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Content</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($stores as $store)
                                        <tr>
                                            <td>{{$store->id}}</td>
                                            <td>{{$store->name}}</td>
                                            <td>{{$store->content}}</td>
                                            <td>{{$store->created_at}}</td>
                                            <td>{{$store->updated_at}}</td>
                                            <td>{{$store->status}}</td>
                                            <td>
                                                <img style="width: 90px;height: 60px" src="{{asset($store->image)}}">
                                            </td>
                                            <td>

{{--                                                @can('changeStatus-blog')--}}
{{--                                                    <a href="{{route('admin.blogs.changeStatus',$store)}}"  class="btn btn-{{$store->status==0?'danger':'success'}} float-left btn-sm admin-btn" >--}}
{{--                                                        <i class="fa fa-{{$store->status==0?'check':'power-off'}}"></i>--}}
{{--                                                    </a>--}}
{{--                                                @endcan--}}

                                                {{--                                                @if(in_array($user->role()->first()->id,$permittedRoleIds))--}}
                                                    <a class="btn btn-info btn-sm admin-btn" href="{{route('admin.store.edit',$store->id)}}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
{{--                                                @endif--}}

{{--                                                @can('delete-blog')--}}
                                                    <form action="{{route('admin.store.destroy',$store)}}" method="POST" class="float-left">
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
