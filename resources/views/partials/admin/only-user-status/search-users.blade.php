<script>

    $(document).on('click','.close-icon-button',function () {
        $(this).closest('div.form-group').find('input').val('');
    });

    $(document).on('blur','.inputs5',function () {
        $(this).val().trim()!==''&&getUrlParameter($(this).attr('name'))!==$(this).val().trim()?$("#userSearchBtn").click():false;
        //eger inputun ici bos deyilse ve url'deki muvafiq parameterden ferqlidirse(yeni refresden sonra yazilibsa) submit olunsun .
    });

    $(document).on('change','#userStatus',function () {

        var newUrl=window.location.href;
        var idFromUrl=getUrlParameter('id');
        var nameFromUrl=getUrlParameter('name');
        var emailFromUrl=newUrl.substring(newUrl.lastIndexOf("email"), newUrl.lastIndexOf("&")-('&name='+nameFromUrl).length);//@ isaresi urlde %40 kimi yazilir deye problem yaradirdi digerleri kimi cagiranda .
        var statusFromUrl=getUrlParameter('userStatus');

        var idInput=$("input[name='id']").val().trim();
        var emailInput=$("input[name='email']").val().trim();
        var nameInput=$("input[name='name']").val().trim();

        if (newUrl.search('email')!=-1){ // eger url'de userStatus varsa .
            newUrl=newUrl.replace('id='+idFromUrl,'id='+idInput);
            newUrl=newUrl.replace(emailFromUrl,'email='+emailInput);
            newUrl=newUrl.replace('name='+nameFromUrl,'name='+nameInput);
        }

        var afterChangedStatus=$('#userStatus option:selected').val();

        if(statusFromUrl!==undefined){ // demeli status parametrler icinde yoxdur .
            newUrl=newUrl.replace('userStatus='+statusFromUrl,'userStatus='+afterChangedStatus);
        }else{
            newUrl=newUrl+'?userStatus='+afterChangedStatus;
        }

        window.location.href=newUrl;

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
