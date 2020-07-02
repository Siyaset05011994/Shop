@extends('layouts.admin.master')

@section('content')
    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Blog Edit Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
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


                                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="az_lang_tab" data-toggle="pill" href="#az_lang" role="tab" aria-controls="az_lang" aria-selected="true">AZ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="ru_lang_tab" data-toggle="pill" href="#ru_lang" role="tab" aria-controls="ru_lang" aria-selected="false">RU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="en_lang_tab" data-toggle="pill" href="#en_lang" role="tab" aria-controls="en_lang" aria-selected="false">EN</a>
                                    </li>
                                </ul>


                                    <form action="{{route('admin.blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">

                                            <div class="col-md-7 tab-content" id="custom-content-below-tabContent" style="padding-top: 20px;padding-bottom: 20px">

                                                <div class="tab-pane fade show active" id="az_lang" role="tabpanel" aria-labelledby="az_lang_tab">
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Title</label>
                                                        <input class="form-control" type="text" name="title_az" @if($blog->translate('az')!=null) value="{{$blog->translate('az')->title}}" @endif />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Content</label>
                                                        <textarea rows="8" cols="300" class="form-control tinyTextarea" name="content_az">@if($blog->translate('az')!=null) {{$blog->translate('az')->content}} @endif</textarea>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="ru_lang" role="tabpanel" aria-labelledby="ru_lang_tab">
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Title</label>
                                                        <input class="form-control" type="text" name="title_ru" @if($blog->translate('ru')!=null) value="{{$blog->translate('ru')->title}}" @endif />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Content</label>
                                                        <textarea rows="8" cols="300" class="form-control tinyTextarea" name="content_ru">@if($blog->translate('ru')!=null) {{$blog->translate('ru')->content}} @endif</textarea>
                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="en_lang" role="tabpanel" aria-labelledby="en_lang_tab">
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Title</label>
                                                        <input class="form-control" type="text" name="title_en" @if($blog->translate('en')!=null) value="{{$blog->translate('en')->title}}" @endif />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="lbl-normal-font-size">Content</label>
                                                        <textarea rows="8" cols="300" class="form-control tinyTextarea" name="content_en">@if($blog->translate('en')!=null) {{$blog->translate('en')->content}} @endif</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-5" style="margin-top: 50px">
                                                <div class="slim"
                                                     data-label="Zəhmət olmasa şəkil seçin(Ölçü: 652x503)"
                                                     data-label-loading="Səkil yüklənir"
                                                     data-button-edit-label="Dəyis"
                                                     data-button-remove-label="Sil"
                                                     data-button-upload-label="Yüklə"
                                                     data-button-cancel-label="Imtina"
                                                     data-button-confirm-label="Ok"
                                                     data-ratio="652:503"
                                                     data-size="652,503">
                                                    <img src="{{asset($blog->file)}}">
                                                    <input type="file" name="slim[]" required />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                <br>
                                                <input type="submit" class="btn btn-success float-right" value="Update" />
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.5/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: '.tinyTextarea',
            directionality: document.dir,
            path_absolute: "/",
            menubar: 'edit insert view format table',
            plugins: [
                "advlist autolink lists link image charmap preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media save table contextmenu directionality",
                "paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | formatselect styleselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | fullscreen code",
            relative_urls: false,
            language: document.documentElement.lang,
            height: 300,
            file_browser_callback : function (field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body').clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body').clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no"
                });
            },
        };
        tinymce.init(editor_config);
    </script>
@endsection
