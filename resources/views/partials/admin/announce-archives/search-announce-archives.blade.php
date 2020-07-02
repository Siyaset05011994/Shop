<script>

    $(document).on('click','.close-icon-button',function () {
        $(this).closest('div.form-group').find('input').val('');
    });

    $(document).on('blur','.inputs5',function () {
        $(this).val().trim()!==''&&getUrlParameter($(this).attr('name'))!==$(this).val().trim()?$("#announcesArchiveSearchBtn").click():false;
        //eger inputun ici bos deyilse ve url'deki muvafiq parameterden ferqlidirse(yeni refresden sonra yazilibsa) submit olunsun .
    });


    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    }


</script>
