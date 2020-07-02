
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(document).on('change','.categories',function (){

        var category_id=$(this).val();
        $('.category_parameters').remove();

        if ($(this).attr('id')==='category'){
            $('#categoriesDiv .form-group').not($(this).parent(".form-group")).remove();//eger ilk categoriya secilirse qalan butun select divleri silinir .
        }else{

            var oldChild = $(this).attr('child');
            var newChild = category_id;
            $("#category_div"+oldChild).remove();
            $(this).attr('child',newChild);

        }

        $.ajax({
            type:'POST',
            url:'{{route('admin.category.getSubCategories')}}',
            data:{category_id:category_id},
            success:function (response){

                if (response.categories.length>0){

                    var i=0;
                    var subCategoryLength=response.categories.length;

                        $("#productAddForm #categoriesDiv").append(
                            '<div id="category_div'+ category_id +'" class="form-group">' +
                                '<label>Alt kateqoriyani secin</label>' +
                                '<select name="category[]" id="category_' + category_id + '" class="categories form-control">' +
                                    '<option></option>' +
                                '</select>' +
                                '<span id="error_span_category_' + category_id + '" class="error-span"></span>' +
                            '</div>'
                        );

                        for (i;i<subCategoryLength;i++){

                            $('select#category_' + category_id).append('<option value="'+response.categories[i].id+'">'+response.categories[i].name+'</option>');

                        }

                }


                if (response.parameters.length>0){
                    form_element_generate(response.parameters,category_id)
                }

            }
        })

    });


    function form_element_generate(response,category_id){

        var i=0,j=0;

        var parameterDataLength=response.length;

        if (parameterDataLength>0){

            for (var i=0;i<parameterDataLength;i++){

                if (response[i].type=='text'){

                    $('#productAddForm #categoriesDiv').append('<div class="form-group category_parameters" ><label>'+response[i].label+'</label><input class="form-control" type="text" name="'+response[i].name+'"/></div>');

                }else{

                    $('#productAddForm #categoriesDiv').append('<div class="form-group category_parameters" ><label>'+response[i].label+'</label><select class="form-control" id="'+category_id+'_'+i+'" name="'+response[i].name+'"><option></option></select></div>');

                    var parameterValuesDataLength=response[i].values.length;

                    for (var j=0;j<parameterValuesDataLength;j++){

                        $('select#'+category_id+'_'+i).append('<option value="'+response[i].values[j].value+'">'+response[i].values[j].value+'</option>');

                    }

                }
            }

        }


    }





    // multiple image upload


    var target='uploads/';
    var loading_gif_src="{{asset('/')}}assets/admin/images/loading.gif";
    var all_uploading_image_count=0; // umumen Gonder duymesi basilanadek upload olan sekillerin cemi .
    //her change funksiyasi iwleyende ondan evvelki upload olan sekil sayi
    /*esas sekil divine id verende yoxlayacam : eger count_recent_upload deyiseni sifirdisa ele id''ye 'div_img_'+x verecem .
    yox eger sifir deyilse   'div_img_'+count_recent_upload    verecem .

     */

    $(document).on('change','#file',function (e) {

        var count_selected_files = $(this)[0].files.length;

        if(count_selected_files>0) {

            $('#send_announce').html('<span class="lds-ring"><span></span><span></span><span></span><span></span></span>  <span style="margin-left: 10px;">Gözləyin...</span>').attr('disabled', true);

            var valid_file_format = ['image/jpeg', 'image/jpg', 'image/png']; //icaze verdiyim fayl formatlari .

            for (let x = 0; x < count_selected_files; x++) {

                var form_data = new FormData();
                var file=this.files[x];
                var type_file=file.type;

                if(jQuery.inArray(type_file, valid_file_format) !== -1)
                {
                    form_data.append("file", file);
                    form_data.append('file_row',x);

                    //file secilib ok basilan kimi dile sayinda div ve image icinde loading yaranir .
                    $("#add_announce_image_ul").append(
                        "<div class='li_div' id='div_img_" + x + "' > " +
                        "<li class='announces_image_li li_loading'>" +
                        "<img class='announces_image top-position' src='"+loading_gif_src+"'>" +
                        "</li>" +
                        "<div class='image-operations'>" +
                        "<a class='btn btn-default remove-arrow fa fa-remove'></a>" +
                        "<div class='rotateDiv'>"+
                            "<a class='btn btn-default left-arrow fa fa-rotate-left' ></a>" +
                            "<a class='btn btn-default right-arrow fa fa-rotate-right' ></a>" +
                        "</div>"+
                        "</div>" +
                        "<input class='img_settings_inp' type='hidden' degree='0' >" +
                        "</div>"
                    );

                    $.ajax({
                        type: "POST",
                        url: '{{route('admin.addAnnounce')}}', // point to server-side PHP script
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        success: function (response) {

                            var get_file_row = response.substring(
                                response.lastIndexOf("&") + 1,
                            );

                            var image_name_without_ext = response.substring(
                                response.lastIndexOf("/") + 1,
                                response.lastIndexOf(".")
                            );

                            var image_name=response.substring(
                                response.lastIndexOf("/") + 1,
                                response.lastIndexOf("&")
                            );

                            $("#div_img_"+get_file_row).empty(); //her php terefden sorgu gelende evvelki bos qutulari silir .

                            $("#div_img_"+get_file_row).append( //silinen bos qutularin yerine ici dolu qutular yaradir .
                                "<li class='announces_image_li'>" +
                                "<img class='announces_image top-position " + image_name_without_ext + " announceImg"+(x+1)+"' id='img_" + image_name_without_ext + "'  src='{{asset('/uploads/announces/thumb')}}/" + image_name + "'>" +
                                "</li>" +
                                "<div class='image-operations'>" +
                                "<a class='btn btn-default remove-arrow fa fa-remove " + image_name_without_ext + "' name='" + image_name + "' id='remove_" + image_name_without_ext + "'></a>" +
                                "<div class='rotateDiv'>"+
                                    "<a class='btn btn-default left-arrow fa fa-rotate-left " + image_name_without_ext + "'  name='" + image_name + "'  id='left_" + image_name_without_ext + "'></a>" +
                                    "<a class='btn btn-default right-arrow fa fa-rotate-right " + image_name_without_ext + "'  name='" + image_name + "'  id='right_" + image_name_without_ext + "'></a>" +
                                "</div>"+
                                "</div>" +
                                "<input class='img_settings_inp'  id='img_settings_" + image_name_without_ext + "' name='" + image_name + "' type='hidden' degree='0' >"
                            );

                            $("#div_img_"+get_file_row).attr('id','div_'+image_name_without_ext);

                            $('.announceImg'+(x+1)).on('load',function(){
                                checkEndImageLoad();
                            });

                        }

                    });



                }

            }


            var announceImgCount=count_selected_files;

            function checkEndImageLoad() {
                announceImgCount--;
                if (announceImgCount===0){
                    $('#send_announce').html('Təsdiqlə').attr('disabled', false);
                }
            }


            $("#file").val(''); //fayllar secilib bir-bir php terefine otrulenden sonra file yaddasi silinir . Silinmedikde bir sekli secdikden sonra hemin sekli bir de secmek olmur.


        }

    });





    $(document).on('click','.remove-arrow',function () {
        var remove_btn_id=$(this).attr("id");
        var div="div_"+remove_btn_id.replace('remove_','');
        var image_name=$(this).attr('name');
        $.ajax({
            type: "GET",
            url: '{{route('admin.removeAnnounceImage')}}',
            data: "image_name="+image_name, //post'da bucur otururuk data'ni .
            success: function (response) {
                if (response=='ok')
                {
                    $('#'+div).remove();
                }
                else
                {
                    console.log(response);
                }
            }
        });
    });



    $(document).on('click','.right-arrow',function () {

        var img_name_without_ext=$(this).attr("id").replace('right_','');
        var img_input_hidden_id="img_settings_"+img_name_without_ext;
        var image_degree=parseInt($("#"+img_input_hidden_id).attr("degree"));
        var img_id=$("#img_"+img_name_without_ext);
        var image_name=$(this).attr('name');

        if($(img_id).hasClass('top-position')){
            $(img_id).addClass('right-position');
            $(img_id).removeClass('top-position');
        }else if($(img_id).hasClass('right-position')){
            $(img_id).addClass('bottom-position');
            $(img_id).removeClass('right-position');
        }else if($(img_id).hasClass('bottom-position')){
            $(img_id).addClass('left-position');
            $(img_id).removeClass('bottom-position');
        }else if($(img_id).hasClass('left-position')){
            $(img_id).addClass('top-position');
            $(img_id).removeClass('left-position');
        }

        image_degree=-90;
        $("#"+img_input_hidden_id).attr('degree',image_degree);

        $.ajax({
            type: "GET",
            url: '{{route('admin.rotateAnnounceImage')}}',
            data: "image_name="+image_name+"&image_degree="+image_degree, //post'da bucur otururuk data'ni .
            success: function (response) {
                console.log(response);
            }
        });

    });



    $(document).on('click','.left-arrow',function () {

        var img_name_without_ext=$(this).attr("id").replace('left_','');
        var img_input_hidden_id="img_settings_"+img_name_without_ext;
        var image_degree=parseInt($("#"+img_input_hidden_id).attr("degree"));
        var img_id=$("#img_"+img_name_without_ext);
        var image_name=$(this).attr('name');

        if($(img_id).hasClass('top-position')){
            $(img_id).addClass('left-position');
            $(img_id).removeClass('top-position');
        }else if($(img_id).hasClass('left-position')){
            $(img_id).addClass('bottom-position');
            $(img_id).removeClass('left-position');
        }else if($(img_id).hasClass('bottom-position')){
            $(img_id).addClass('right-position');
            $(img_id).removeClass('bottom-position');
        }else if($(img_id).hasClass('right-position')){
            $(img_id).addClass('top-position');
            $(img_id).removeClass('right-position');
        }

        image_degree=90;
        $("#"+img_input_hidden_id).attr('degree',image_degree);

        $.ajax({
            type: "GET",
            url: '{{route('admin.rotateAnnounceImage')}}',
            data: "image_name=" + image_name + "&image_degree=" + image_degree, //post'da bucur otururuk data'ni .
            success: function (response) {
                console.log(response);
            }
        });


    });





    //multiple image upload


    $(document).on('submit','#productAddForm',function(e) {

        e.preventDefault();

        var data=$(this).serialize();

        var img_info=$('.img_settings_inp');
        var image_count= $('.announces_image').length;
        var image_names='';

        for (var i=0;i<image_count;i++)
        {
            image_names+=img_info[i].name+',';
        }

        image_names=image_names.slice(0,-1);

        $.ajax({
            type:'POST',
            url:'{{route('admin.product.store')}}',
            data:data+"&image_names="+image_names,
            success:function (response){
                if (response.success!==undefined){
                    location.href='{{route('admin.product.index')}}';
                }else{
                  console.log(response);
                }
            }
        });

    });

</script>

