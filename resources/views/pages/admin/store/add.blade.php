@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Store add</h1>
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

                                <form action="{{route('admin.store.store')}}" method="post" enctype="multipart/form-data">
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
                                                <label>Content</label>
                                                <textarea rows="6" name="text" class="form-control">{{old('text')}}</textarea>
                                                @if($errors->has('text'))
                                                    <span class="error-span1">{{$errors->first('text')}}</span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="col-md-6" style="padding-top: 32px">
                                            <div class="slim"
                                                 data-label="Zəhmət olmasa şəkil seçin(Ölçü: 652x503)"
                                                 data-label-loading="Səkil yüklənir"
                                                 data-button-edit-label="Dəyis"
                                                 data-button-remove-label="Sil"
                                                 data-button-upload-label="Yüklə"
                                                 data-button-cancel-label="Imtina"
                                                 data-button-confirm-label="Ok"
                                                 data-ratio="2:1"
                                                 data-size="200,100">
                                                <input type="file" name="slim[]" required />
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
