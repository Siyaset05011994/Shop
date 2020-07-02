@extends('layouts.admin.master')

@section('content')
    @include('partials.admin.product.add-product-scripts')

    <div class="content-wrapper" style="min-height: 326px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Product add</h1>
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

                                <form action="{{route('admin.product.store')}}" id="productAddForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label>Stores</label>
                                                <select name="store" id="store" class="stores form-control">
                                                    <option></option>
                                                    @foreach($stores as $store)
                                                        <option value="{{$store->id}}">{{$store->name}}</option>
                                                    @endforeach
                                                </select>
                                                <span id="error_span_store" class="error-span"></span>
                                            </div>

                                            <div id="categoriesDiv">
                                                <div class="form-group">
                                                    <label>Categories</label>
                                                    <select name="category[]" id="category" class="categories form-control">
                                                        <option></option>
                                                        @foreach($categories as $categorie)
                                                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span id="error_span_category" class="error-span"></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" id="name" class="form-control">
                                                <span id="error_span_name" class="error-span"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Content</label>
                                                <textarea rows="6" name="text" id="text" class="form-control tinyTextarea"></textarea>
                                                <span id="error_span_text" class="error-span"></span>
                                            </div>

                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity" id="quantity" class="form-control">
                                                <span id="error_span_quantity" class="error-span"></span>
                                            </div>




                                            <div class="form-group row">
                                            <div class="col-md-12">
                                                <div id="selectImage">
                                                    <input type="file" name="file[]" id="file" class="inputfile" accept="image/jpg,image/jpeg,image/png"  multiple />
                                                    <label for="file"><strong>Şəkilləri seçin(Minimum 4 şəkil)</strong></label>
                                                    <span class="error-span" id="error_span_images"></span>
                                                </div>

                                            </div>

                                                <div id="message" class="col-md-12" style="padding-left: 20px">
                                                    <ul class="image_ul sortable_image_ul" id="add_announce_image_ul" >

                                                    </ul>
                                                </div>

                                                <br>
                                    </div>


                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <input type="submit" id="addProductBtn" class="btn btn-success float-right" value="Insert"/>
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
