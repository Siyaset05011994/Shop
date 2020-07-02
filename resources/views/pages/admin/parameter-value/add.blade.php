@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Parameter value add</h1>
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

                                <form action="{{route('admin.parameter-value.store')}}" method="post">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>Check parameter</label>
                                            <ul style="list-style-type:none">

                                                @foreach($parameters as $parameter)
                                                    <li>
                                                        <input {{old('parameter_id')==$parameter->id?'checked':false}} style="margin-right: 5px" type="radio" class="parameter_inpt" id="parameter_input_{{$parameter->id}}" value="{{$parameter->id}}" name="parameter_id">
                                                        <label class="font-weight-bold parameter_lbl" for="parameter_input_{{$parameter->id}}">{{ $parameter->name }}</label>
                                                    </li>
                                                @endforeach

                                                @if($errors->has('parameter_id'))
                                                    <span class="error-span1">{{$errors->first('parameter_id')}}</span>
                                                @endif

                                            </ul>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Value</label>
                                                <input type="text" name="value" value="{{old('value')}}" class="form-control">
                                                @if($errors->has('value'))
                                                    <span class="error-span1">{{$errors->first('value')}}</span>
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
