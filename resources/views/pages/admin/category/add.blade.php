@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Category add</h1>
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

                                <form action="{{route('admin.category.store')}}" method="post">
                                    @csrf
                                    <div class="row">

                                        @if(count($categories)>0)
                                            <div class="col-md-6">
                                                <label>Parent(not mandatory)</label>
                                                <ul style="list-style-type:none">
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <input {{old('parent_id')==$category->id?'checked':false}} style="margin-right: 5px" type="radio" class="category_inpt" id="category_input_{{$category->id}}" value="{{$category->id}}" name="parent_id">
                                                            <label class="font-weight-bold category_lbl" for="category_input_{{$category->id}}">{{ $category->name }}</label>
                                                        </li>

                                                        @if($category->childs->isNotEmpty())
                                                            @include('partials.admin.category.sub_category_list', [
                                                                'childs' => $category->childs
                                                            ])
                                                        @endif
                                                    @endforeach
                                                        @if($errors->has('parent_id'))
                                                            <span class="error-span1">{{$errors->first('parent_id')}}</span>
                                                        @endif
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                                @if($errors->has('name'))
                                                    <span class="error-span1">{{$errors->first('name')}}</span>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <input style="cursor: pointer" type="checkbox" {{old('parameter_exists')=='1'?'checked':false}} id="parameter_exists" name="parameter_exists" value="1" > &nbsp;
                                                <label style="cursor: pointer" for="parameter_exists">Need to add a parameter ?</label>
                                                @if($errors->has('parameter_exists'))
                                                    <span class="error-span1">{{$errors->first('parameter_exists')}}</span>
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
