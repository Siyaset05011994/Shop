<script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            //her page deyisende hemin status divinin icindeki hidden type'li inputa value kimi hazirki page'ni yazacaq ve bundan diger statuslardan bu statusa yeniden kecid edende istifade edecem .
            var page=$(this).attr('href').split('page=')[1];
            // $("#current_page").attr(status,page);
            getPosts(page);
        });



        $(document).on('focusout','#admin_announces_id_search',function (e) { 
            $("#admin_announces_id_search_hidden").val($(this).val());
            getPosts('');
        });

        $(document).on('keypress','#admin_announces_id_search',function (e) { 
            if(e.which == 13) {
                $("#admin_announces_id_search_hidden").val($(this).val());
                getPosts('');
            }
        });




        $(document).on('focusout','#admin_announces_email_search',function () {
            $("#admin_announces_email_search_hidden").val($(this).val());
            getPosts('');
        });

        $(document).on('keypress','#admin_announces_email_search',function (e) { 
            if(e.which == 13) {
                $("#admin_announces_email_search_hidden").val($(this).val());
                getPosts('');
            }
        });




        $(document).on('focusout','#admin_announces_name_search',function () {
            $("#admin_announces_name_search_hidden").val($(this).val());
            getPosts('');
        });

        $(document).on('keypress','#admin_announces_name_search',function (e) { 
            if(e.which == 13) {
                $("#admin_announces_name_search_hidden").val($(this).val());
                getPosts('');
            }
        });




        $(document).on('focusout','#admin_announces_phone_search',function () {
            $("#admin_announces_phone_search_hidden").val($(this).val());
            getPosts('');
        });

        $(document).on('keypress','#admin_announces_phone_search',function (e) { 
            if(e.which == 13) {
                $("#admin_announces_phone_search_hidden").val($(this).val());
                getPosts('');
            }
        });




        $(document).on('change','#change_announce_status',function () {
            $("#announce_admin_tr input").val('');
            $("#admin_announce_card .admin_announce_hiddens").val('');
            getPosts('')
        });
        

    });


    function getPosts(page) {

        var  status=$("#change_announce_status option:selected").val();
        var  search_id=$("#admin_announces_id_search").val();
        var  search_email=$("#admin_announces_email_search").val();
        var  search_name=$("#admin_announces_name_search").val();
        var  search_phone=$("#admin_announces_phone_search").val();

        $.ajax({
            type:'GET',
            url : '?page=' + page,
            data:{
                status:status,
                id:search_id,
                email:search_email,
                name:search_name,
                phone:search_phone,
            },
            dataType: 'json',
        }).done(function (data) {
            $('#announces_table_in_admin').empty().html(data);

            $("#admin_announces_id_search").val($("#admin_announces_id_search_hidden").val());
            $("#admin_announces_email_search").val($("#admin_announces_email_search_hidden").val());
            $("#admin_announces_name_search").val($("#admin_announces_name_search_hidden").val());
            $("#admin_announces_phone_search").val($("#admin_announces_phone_search_hidden").val());

            if (page.length>0){
                location.hash = page;
            }

            $('html,body').animate({
                    scrollTop: $("#admin_announce_card").offset().top},0);

        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

</script>
