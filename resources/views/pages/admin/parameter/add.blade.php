@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Parameter add</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">

                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <form action="{{route('admin.parameter.store')}}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                                @if($errors->has('name'))
                                                    <span class="error-span1">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Label</label>
                                                <input type="text" name="label" value="{{old('label')}}" class="form-control">
                                                @if($errors->has('label'))
                                                    <span class="error-span1">{{$errors->first('label')}}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label>Select type</label>
                                                <select name="type" class="form-control">
                                                    @foreach(config('app.aviable_parameter_types') as $type)
                                                        <option {{old('type')==$type?'selected':false}} value="{{$type}}">{{$type}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('type'))
                                                    <span class="error-span1">{{$errors->first('type')}}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <input type="submit" class="btn btn-success float-right" value="Insert"/>
                                        </div>

                                    </div>

                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
