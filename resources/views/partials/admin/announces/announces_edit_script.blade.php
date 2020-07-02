<script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;" type="text/javascript"></script>
<script src="{{asset('assets/client/js/masked_input.js')}}"></script>

<script>

    $(document).on('keyup','#address',function (){

        var addressInptLength=$(this).val().length;

        if (70-addressInptLength>=0){
            $("#addressLimit").css('color','green');
            $("#addressLimit").text('qaldı '+(70-addressInptLength));
        }else{
            $("#addressLimit").css('color','red');
            $("#addressLimit").text(parseInt(Math.abs(70-addressInptLength))+' simvol yazilmayacaq');
        }

        $('#error_span_address').hide();
        $('#addressLimit').show();

    });

    $(document).on('click','#phone_back_div #add_phone',function () {
        var phoneCount=parseInt($("#phone_back_div #hiddenPhoneCount").val());
        var showPhoneDiv2=$("#phone_back_div #showPhoneDiv2").val();
        var showPhoneDiv3=$("#phone_back_div #showPhoneDiv3").val();

        if (showPhoneDiv2=='1'&&showPhoneDiv3=='1'){
            $("#phone_back_div #phone_div_2").show();
            $("#phone_back_div #showPhoneDiv2").val('');
        }

        if (showPhoneDiv2=='1'&&showPhoneDiv3!='1'){
            $("#phone_back_div #phone_div_2").show();
            $("#phone_back_div #showPhoneDiv2").val('');
        }

        if (showPhoneDiv2!='1'&&showPhoneDiv3=='1'){
            $("#phone_back_div #phone_div_3").show();
            $("#phone_back_div #showPhoneDiv3").val('');
        }

        if (phoneCount<=2){
            $("#phone_back_div #hiddenPhoneCount").val(phoneCount+1);
        }

        if (phoneCount==2){
            $("#phone_back_div #add_phone").hide();
        }
    });


    $(document).on('click','#phone_back_div .delete_phone',function () {
        var phoneCount=parseInt($("#phone_back_div #hiddenPhoneCount").val());

        var parent_div=$(this).parent().parent().parent().attr('id');
        var delete_phone_id_last_character=$(this).attr('id').substr($(this).attr('id').length - 1);
        $("#phone_back_div #phone_"+delete_phone_id_last_character).val('');
        $("#phone_back_div #"+parent_div).hide();
        $("#phone_back_div #showPhoneDiv"+delete_phone_id_last_character).val('1');

        if (phoneCount>1){
            $("#phone_back_div #hiddenPhoneCount").val(phoneCount-1);
        }


        if (phoneCount-1<3){
            $("#phone_back_div #add_phone").show();
        }
    });



    $(function () {
        $(".phone_input").mask("(999) 999-99-99");
    });


    $(document).on('focus click','.phone_input', function() {
        $(this)[0].setSelectionRange(0, 0);
    })


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });


    $(document).ready(function () {

        $('#addressLimit').css('color','green').text('qaldı '+(70-Math.abs($('#address').val().length)));

        var coordinates = document.getElementById('yandex_map').value;
        $("#result_map_input").val(coordinates)
        coordinates = coordinates.replace('(', '');
        coordinates = coordinates.replace(')', '');
        coordinates = coordinates.split(', ');

        $("#result_map").empty();
        $("#result_map").css('height',400);

        ymaps.ready(init);

        function init(){
            var myMap = new ymaps.Map("result_map", {
                center: [coordinates[0], coordinates[1]],
                zoom: 14,
                controls: []
            });

            //xerite markerinin olacagi araligi teyin edib onu xeriteye elave edirik
            var myPlacemark = new ymaps.Placemark([coordinates[0],coordinates[1]]);
            myMap.geoObjects.add(myPlacemark);
            //xerite markerinin olacagi araligi teyin edib onu xeriteye elave edirik
        }
    });



    $(document).ready(function () {

        // $("#districts_div").hide();
        // $("#subways_div").hide();
        // $("#village_div").hide();
        // $("#common_floor_count_div").hide();
        // $("#located_floor_div").hide();

        var hidden_email=$("#hidden_email").val();
        var hidden_ann_type=$("#hidden_ann_type").val();
        var hidden_common_floor_count=$("#hidden_common_floor_count").val();
        var hidden_located_floor=$("#hidden_located_floor").val();
        var hidden_city=$("#hidden_city").val();
        var hidden_district=$("#hidden_district").val();
        var hidden_village=$("#hidden_village").val();
        var hidden_subway=$("#hidden_subway").val();
        var hidden_room_count=$("#hidden_room_count").val();
        var hidden_bed_count=$("#hidden_bed_count").val();

        $('#common_floor_count_sel option[value="'+hidden_common_floor_count+'"]').attr('selected','selected');
        $('#located_floor_sel option[value="'+hidden_located_floor+'"]').attr('selected','selected');
        $('#room_count option[value="'+hidden_room_count+'"]').attr('selected','selected');
        $('#bed_count option[value="'+hidden_bed_count+'"]').attr('selected','selected');
        $('#email').val(hidden_email);

        function getAnnounceTypes()
        {
            var i=0;
            var announceTypeSelected;

            $.ajax({
                type:'GET',
                url:'{{route('client.getAnnounceTypes',app()->getLocale())}}',
                dataType:'json',
                success:function (response) {
                    var json=response.data;
                    // console.log(json[0].id);
                    for (i;i<json.length;i++){
                        if(json[i].id==hidden_ann_type){
                            announceTypeSelected='selected';
                        }else{
                            announceTypeSelected='';
                        }
                        $("#announce_type").append('<option '+announceTypeSelected+' located_floor="'+json[i].located_floor+'" common_floor_count="'+json[i].common_floor_count+'" value="'+json[i].id+'">'+json[i].title+'</option>');
                    }

                }
            });
        }

        getAnnounceTypes();


        function getCities()
        {
            var i=0;
            var citySelected;

            $.ajax({
                type:'GET',
                url:'{{route('client.getCities',app()->getLocale())}}',
                dataType:'json',
                success:function (response) {
                    var json=response.data;
                    for (i;i<json.length;i++){
                        if(json[i].id==hidden_city){
                            citySelected='selected';
                        }else{
                            citySelected='';
                        }
                        $("#cities").append('<option '+citySelected+' coordinate="'+json[i].coordinate+'" value="'+json[i].id+'">'+json[i].title+'</option>');
                    }
                }
            });
        }

        getCities();



        function getDistrictMetro()
        {
            var i=0,j=0;
            var districtSelected,subwaySelected;

            $.ajax({
                type:'GET',
                url:'{{route('client.getDistrictsMetroGet',app()->getLocale())}}',
                data:{city_id:hidden_city},
                success:function (response) {
                    var districts=response.districts;
                    var subways=response.subways;

                    $('#district_sel').html('<option selected="selected"></option>');
                    for (i;i<districts.length;i++){
                        if(districts[i].id==hidden_district){
                            districtSelected='selected';
                        }else{
                            districtSelected='';
                        }
                        $("#district_sel").append('<option '+districtSelected+' value="'+districts[i].id+'">'+districts[i].title+'</option>');
                    }

                    $('#subway_sel').html('<option selected="selected"></option>');
                    for (j;j<subways.length;j++){
                        if(subways[j].id==hidden_subway){
                            subwaySelected='selected';
                        }else{
                            subwaySelected='';
                        }
                        $("#subway_sel").append('<option '+subwaySelected+' value="'+subways[j].id+'">'+subways[j].title+'</option>');
                    }
                }
            });
        }

        getDistrictMetro();


        function getVillageForDistrict()
        {
            var i=0;
            var villageSelected;

            $.ajax({
                type:'GET',
                url:'{{route('client.getVillageForDistrict',app()->getLocale())}}',
                dataType:'json',
                data:{district_id:hidden_district},
                success:function (response) {
                    var villages=response;
                    if(villages.length>0)
                    {
                        $('#village_sel').html('<option selected="selected"></option>');
                        $("#village_div").show();
                        for (i;i<villages.length;i++){
                            if(villages[i].id==hidden_village){
                                villageSelected='selected';
                            }else{
                                villageSelected='';
                            }
                            $("#village_sel").append('<option '+villageSelected+' value="'+villages[i].id+'">'+villages[i].title+'</option>');
                        }
                    }
                    else
                    {
                        $("#village_div").hide();
                    }
                }
            });
        }

        getVillageForDistrict();


        var checkboxMessagesString='';

        $(document).on('change','.messageCheckboxes',function(){
             var messageInput=$(this).attr('id').replace('Checkbox','');
             $('#'+messageInput).toggle();

             if($(this).prop("checked") == false){
                 $('.checkboxMessagesSpan').hide();
                 $('#'+messageInput).val('');
                 checkboxMessagesString=checkboxMessagesString.replace(messageInput+',','');
                 $("#checkboxMessagesString").val(checkboxMessagesString);
             }else{
                     checkboxMessagesString+=messageInput+','
                     $("#checkboxMessagesString").val(checkboxMessagesString);
             }
        });

        $(document).on('change','#cities',function () {

            var i=0,j=0;
            var city_id=$(this).val();

            $("#district_sel").empty(); //her change olunanda sifirlanir ve yeniden yuklenir .
            $("#subway_sel").empty(); //her change olunanda sifirlanir ve yeniden yuklenir .
            $("#village_div").hide(); //her change olunanda village div itir . rayonu secmeyince de gelmir .

            $.ajax({
                type: "POST",
                url: '{{route('client.getDistrictsMetro',app()->getLocale())}}', // point to server-side PHP script
                data:{city_id:city_id},
                success: function (response) {
                    var districts=response.districts;
                    var subways=response.subways;

                    if(districts.length>0)
                    {
                        $('#district_sel').html('<option selected="selected"></option>');
                        $("#districts_div").show();
                        for (i;i<districts.length;i++){
                            $("#district_sel").append('<option value="'+districts[i].id+'">'+districts[i].title+'</option>');
                        }
                    }
                    else
                    {
                        $("#districts_div").hide();
                    }

                    if(subways.length>0)
                    {
                        $('#subway_sel').html('<option selected="selected" value></option>');
                        $("#subways_div").show();
                        for (j;j<subways.length;j++){
                            $("#subway_sel").append('<option value="'+subways[j].id+'">'+subways[j].title+'</option>');
                        }
                    }
                    else
                    {
                        $("#subways_div").hide();
                    }

                }

            });



            var city_coordinate=$('option:selected', this).attr('coordinate'); // seheri her deyisende coordinate'ni goturur.

            if(city_coordinate.length>0)
            {
                var city_name=$("#cities option:selected").text();
                $("#map_header_title").text(city_name+' şəhəri');
                $("#yandex_map").val(city_coordinate); //goturduyu coordinate'ni yandex_map inputuna value kimi oturur .
            }
            else
            {
                $("#yandex_map").val('(40.40983633607086, 49.86763000488281)');
            }


            ymaps.ready(initialize);

            function initialize() {

                var coordinates = document.getElementById('yandex_map').value;
                coordinates = coordinates.replace('(', '');
                coordinates = coordinates.replace(')', '');
                coordinates = coordinates.split(', ');

                $("#map_modal_body").empty(); // her basilanda xerite divinin icindeki xerite datalarini temizleyir .

                var myPlacemark,
                    myMap = new ymaps.Map('map_modal_body', {
                        center: [coordinates[0], coordinates[1]],
                        zoom: 11,
                        controls: ["zoomControl"]
                    }, {
                        searchControlProvider: 'yandex#search'
                    });


                //sehife acilan kimi marker ve onun unvaninin gosterilmesi
                myPlacemark = createPlacemark([coordinates[0], coordinates[1]]);
                myPlacemark.geometry.setCoordinates([coordinates[0], coordinates[1]]);
                myPlacemark = createPlacemark([coordinates[0], coordinates[1]]);
                myMap.geoObjects.add(myPlacemark);
                getAddress([coordinates[0], coordinates[1]]);
                //sehife acilan kimi marker ve onun unvaninin gosterilmesi


                myMap.events.add('click', function (e) {
                    var coords = e.get('coords');
                    var click_coordinates_format = '(' + coords[0] + ', ' + coords[1] + ')';
                    document.getElementById('yandex_map').value = click_coordinates_format;
                    if (myPlacemark) {
                        myPlacemark.geometry.setCoordinates(coords);
                    } else {
                        myPlacemark = createPlacemark(coords);
                        myMap.geoObjects.add(myPlacemark);
                    }


                    getAddress(coords);
                });


                myPlacemark.events.add('dragend', function () {
                    var draggable_coordinates = myPlacemark.geometry.getCoordinates();
                    getAddress(draggable_coordinates);
                    var draggable_coordinates_format = '(' + draggable_coordinates[0] + ', ' + draggable_coordinates[1] + ')';
                    document.getElementById('yandex_map').value = draggable_coordinates_format;
                });

                function createPlacemark(coords) {
                    return new ymaps.Placemark(coords, {
                        iconCaption: 'Point A'
                    }, {
                        preset: 'twirl#blueStretchyIcon',
                        draggable: true
                    });
                }


                function getAddress(coords) {
                    myPlacemark.properties.set('iconCaption', 'Point A');
                    ymaps.geocode(coords).then(function (res) {
                        var firstGeoObject = res.geoObjects.get(0);

                        myPlacemark.properties
                            .set({

                                iconCaption: [
                                    firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                    firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                                ].filter(Boolean).join(', '),
                                balloonContent: firstGeoObject.getAddressLine()
                            });
                    });
                }
            }



        });




        $(document).on('click','#confirm_map_btn',function () {

            var coordinates = document.getElementById('yandex_map').value;
            $("#result_map_input").val(coordinates)
            coordinates = coordinates.replace('(', '');
            coordinates = coordinates.replace(')', '');
            coordinates = coordinates.split(', ');

            $("#result_map").empty();
            $("#result_map").css('height',400);

            ymaps.ready(init);

            function init(){
                var myMap = new ymaps.Map("result_map", {
                    center: [coordinates[0], coordinates[1]],
                    zoom: 14,
                    controls: []
                });

                //xerite markerinin olacagi araligi teyin edib onu xeriteye elave edirik
                var myPlacemark = new ymaps.Placemark([coordinates[0],coordinates[1]]);
                myMap.geoObjects.add(myPlacemark);
                //xerite markerinin olacagi araligi teyin edib onu xeriteye elave edirik
            }
        });




        $(document).on('change','#announce_type',function () {
            var common_floor_count=$('option:selected', this).attr('common_floor_count');
            var located_floor=$('option:selected', this).attr('located_floor');

            if(common_floor_count!=='null'&&common_floor_count!=="")
            {
                $("#common_floor_count_div").show();
            }
            else
            {
                $("#common_floor_count_div").hide();
            }

            if(located_floor!=='null'&&located_floor!=="")
            {
                $("#located_floor_div").show();
            }
            else
            {
                $("#located_floor_div").hide();
            }

        });


        $(document).on('change','#common_floor_count_sel',function(){

            $('#located_floor_sel').empty();

            var common_floor_count_sel_val=parseInt($(this).val());
            $("#located_floor_sel").append('<option selected></option>');

            for (var i =1; i<=common_floor_count_sel_val; i++) {
                $("#located_floor_sel").append('<option value="'+i+'">'+i+'</option>');
            };

        });



        $(document).on('change','#district_sel',function () {

            var i=0;
            var district_id=$(this).val();
            $("#village_sel").empty();

            $.ajax({
                type: "POST",
                url: '{{route('client.getVillage',app()->getLocale())}}', // point to server-side PHP script
                data:{district_id:district_id},
                success: function (response) {
                    var villages=response;
                    if(villages.length>0)
                    {
                        $('#village_sel').html('<option selected="selected"></option>');
                        $("#village_div").show();
                        for (i;i<villages.length;i++){
                            $("#village_sel").append('<option value="'+villages[i].id+'">'+villages[i].title+'</option>');
                        }
                    }
                    else
                    {
                        $("#village_div").hide();
                    }

                }

            });


        });



        //    only integer value input
        $(".only_integer_input").on("keypress keyup blur",function (event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        //    only integer value input





    });





    var target='uploads/';
    var loading_gif_src="{{asset('/')}}assets/client/images/loading_gif/loading.gif";
    var all_uploading_image_count=0; // umumen Gonder duymesi basilanadek upload olan sekillerin cemi .
    //her change funksiyasi iwleyende ondan evvelki upload olan sekil sayi
    /*esas sekil divine id verende yoxlayacam : eger count_recent_upload deyiseni sifirdisa ele id''ye 'div_img_'+x verecem .
    yox eger sifir deyilse   'div_img_'+count_recent_upload    verecem .

     */

    $(document).on('change','#file',function (e) {

        var count_selected_files = document.getElementById('file').files.length;

        if(count_selected_files>0) {

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
                        "<div class='li_div ' id='div_img_" + x + "' > " +
                        "<li class='announces_image_li li_loading'>" +
                        "<img class='announces_image top-position' src='"+loading_gif_src+"'>" +
                        "</li>" +
                        "<div class='image-operations'>" +
                        "<a class='btn btn-default remove-arrow fa fa-remove'></a>" +
                        "<a class='btn btn-default left-arrow fa fa-rotate-left' ></a>" +
                        "<a class='btn btn-default right-arrow fa fa-rotate-right' ></a>" +
                        "</div>" +
                        "<input class='img_settings_inp' type='hidden' degree='0' >" +
                        "</div>"
                    );

                    $.ajax({
                        type: "POST",
                        url: '{{route('client.add-announce',app()->getLocale())}}', // point to server-side PHP script
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
                                "<img class='announces_image top-position " + image_name_without_ext + "' id='img_" + image_name_without_ext + "'  src='{{asset('/uploads/announces/thumb')}}/" + image_name + "'>" +
                                "</li>" +
                                "<div class='image-operations'>" +
                                "<a class='btn btn-default remove-arrow fa fa-remove " + image_name_without_ext + "' name='" + image_name + "' id='remove_" + image_name_without_ext + "'></a>" +
                                "<a class='btn btn-default left-arrow fa fa-rotate-left " + image_name_without_ext + "'  name='" + image_name + "'  id='left_" + image_name_without_ext + "'></a>" +
                                "<a class='btn btn-default right-arrow fa fa-rotate-right " + image_name_without_ext + "'  name='" + image_name + "'  id='right_" + image_name_without_ext + "'></a>" +
                                "</div>" +
                                "<input class='img_settings_inp'  id='img_settings_" + image_name_without_ext + "' name='" + image_name + "' type='hidden' degree='0' >"
                            );

                            $("#div_img_"+get_file_row).attr('id','div_'+image_name_without_ext);


                        }

                    });



                }

            }

            $("#file").val(''); //fayllar secilib bir-bir php terefine otrulenden sonra file yaddasi silinir . Silinmedikde bir sekli secdikden sonra hemin sekli bir de secmek olmur.

        }

    });


    //
    $(document).on('click','.remove-arrow',function () {
        var remove_btn_id=$(this).attr("id");
        var div="div_"+remove_btn_id.replace('remove_','');
        var image_name=$(this).attr('name');
        $.ajax({
            type: "GET",
            url: '{{route('client.removeAnnounceImage',app()->getLocale())}}',
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
            url: '{{route('client.rotateAnnounceImage',app()->getLocale())}}',
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
            url: '{{route('client.rotateAnnounceImage',app()->getLocale())}}',
            data: "image_name=" + image_name + "&image_degree=" + image_degree, //post'da bucur otururuk data'ni .
            success: function (response) {
                console.log(response);
            }
        });


    });






    ymaps.ready(initialize);

    function initialize() {

        var coordinates = document.getElementById('yandex_map').value;
        coordinates = coordinates.replace('(', '');
        coordinates = coordinates.replace(')', '');
        coordinates = coordinates.split(', ');

        var myPlacemark,
            myMap = new ymaps.Map('map_modal_body', {
                center: [coordinates[0], coordinates[1]],
                zoom: 11,
                controls: ["zoomControl"]
            }, {
                searchControlProvider: 'yandex#search'
            });


        //sehife acilan kimi marker ve onun unvaninin gosterilmesi
        myPlacemark = createPlacemark([coordinates[0], coordinates[1]]);
        myPlacemark.geometry.setCoordinates([coordinates[0], coordinates[1]]);
        myPlacemark = createPlacemark([coordinates[0], coordinates[1]]);
        myMap.geoObjects.add(myPlacemark);
        getAddress([coordinates[0], coordinates[1]]);
        //sehife acilan kimi marker ve onun unvaninin gosterilmesi


        myMap.events.add('click', function (e) {
            var coords = e.get('coords');
            var click_coordinates_format = '(' + coords[0] + ', ' + coords[1] + ')';
            document.getElementById('yandex_map').value = click_coordinates_format;
            if (myPlacemark) {
                myPlacemark.geometry.setCoordinates(coords);
            } else {
                myPlacemark = createPlacemark(coords);
                myMap.geoObjects.add(myPlacemark);
            }


            getAddress(coords);
        });


        myPlacemark.events.add('dragend', function () {
            var draggable_coordinates = myPlacemark.geometry.getCoordinates();
            getAddress(draggable_coordinates);
            var draggable_coordinates_format = '(' + draggable_coordinates[0] + ', ' + draggable_coordinates[1] + ')';
            document.getElementById('yandex_map').value = draggable_coordinates_format;
        });

        function createPlacemark(coords) {
            return new ymaps.Placemark(coords, {
                iconCaption: 'Point A'
            }, {
                preset: 'twirl#blueStretchyIcon',
                draggable: true
            });
        }


        function getAddress(coords) {
            myPlacemark.properties.set('iconCaption', 'Point A');
            ymaps.geocode(coords).then(function (res) {
                var firstGeoObject = res.geoObjects.get(0);

                myPlacemark.properties
                    .set({

                        iconCaption: [
                            firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                            firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                        ].filter(Boolean).join(', '),
                        balloonContent: firstGeoObject.getAddressLine()
                    });
            });
        }
    }


    $(document).on('click','#send_announce',function () {

        $("#addressLimit").hide();

        var checkboxAllMessages=$("#checkboxMessagesString").val().trim();

        if (checkboxAllMessages!==''){ // xeta mesajlari yoxlamasi .
            checkboxAllMessages=$("#checkboxMessagesString").val().slice(0,-1);
            checkboxAllMessages=checkboxAllMessages.split(',');
            var countCheckMessage=checkboxAllMessages.length;
            var i=0;

            for (i;i<countCheckMessage;i++){
                if ($("#"+checkboxAllMessages[i]).val().trim()===''){
                    $("#"+checkboxAllMessages[i]+'Span').show();
                    return false;
                }else{
                    $("#"+checkboxAllMessages[i]+'Span').hide();
                }
            }
        }


        $(".error-span").hide();

        tinyMCE.triggerSave();//kodu yazmayanda tinyMCE yeni yazini goturmur .
        var data=$("#addPropertyForm").serialize();
        var announce_id=$("#hidden_announce_id").val();

        var img_info=$('.img_settings_inp');
        var image_count= $('.announces_image').length;
        var image_names='';

        for (var i=0;i<image_count;i++)
        {
            image_names+=img_info[i].name+',';
        }

        image_names=image_names.slice(0,-1);

        var errorSpanIds=[];

        $(".error-span").each(function() {
            errorSpanIds.push($(this).attr('id').replace('error_span_',''));
        });

        $.ajax({
            type: "POST",
            url: '{{route('admin.announces.update')}}', // point to server-side PHP script
            data:data+"&image_names="+image_names+"&announce_id="+announce_id,
            success: function (response) {

                $("#response_message_text").empty();

                if(response!=='send_wrong_email'){ //eger sehv doldurulmus sahe yoxdursa

                    if(response.announceOkId!== undefined)
                    {
                         $("#response_message_text").text('Uğurla redakte edildi .');
                         requestMessage(window.location.href);
                         $('.checkboxMessagesSpan').hide();
                    }else{

                        var responseToArr=[];

                        $.each(response, function (index) {
                            responseToArr.push(index);
                        });

                        $.each(response, function( index, value ) {
                            $('#'+'error_span_'+index).text(value);
                            $('#'+'error_span_'+index).show();

                        });


                        $.grep(errorSpanIds, function(el) {
                            if ($.inArray(el, responseToArr) == -1){ // if item not exists inside responseToArr
                                $("#addAnnounceBgs #error_span_"+el).text('').hide();
                            }
                        });

                    }


                }else{
                         $("#response_message_text").text('Xəbərdarlıq göndərildi .');
                         requestMessage("{{route('admin.announces.index')}}");
                }

            }


        });
    });


    function requestMessage(announcesHref) {
        $("#response_message").show();
        setTimeout(function(){
            $("#response_message").fadeOut(500);
            window.location.href=announcesHref;
        }, 2000);
    }





</script>
