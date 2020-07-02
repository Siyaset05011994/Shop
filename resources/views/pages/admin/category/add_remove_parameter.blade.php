@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add ( remove ) parameter</h1>
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

                                <form action="{{route('admin.category.addRemoveParametr',$category->id)}}" method="post">
                                    @csrf
                                    <div class="row">

                                        @if(count($parameters)>0)
                                            <div class="col-md-12">
                                                <label>Select parameter for category '{{$category->name}}'</label>
                                                <ul style="list-style-type:none">

                                                    @foreach($parameters as $parameter)
                                                        <li>
                                                              <input {{in_array($parameter->id,$category_parameter_ids)?'checked':false}} style="margin-right: 5px;cursor: pointer" type="checkbox" id="parameter{{$parameter->id}}" value="{{$parameter->id}}" name="parameter[]">
                                                              <label class="font-weight-bold" for="parameter{{$parameter->id}}" style="cursor: pointer">{{ $parameter->name }}</label>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        @endif

                                        <div class="col-md-12">
                                            <br>
                                            <input type="submit" class="btn btn-success float-right" value="Save"/>
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

