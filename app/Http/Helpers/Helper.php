<?php

use App\Classes\Slim;
use App\Models\Category;

if (!function_exists('test')) {
    function test($parent_id=0)
    {
        $filter=[];
        $categories=Category::where('status',1)->where('parent_id',$parent_id)->get();

        if (count($categories)>0){
            foreach ($categories as $category){
//                if ($category->parent_id==0){
//                    echo '<b>'.$category->name.'</b>';
//                    echo '<br>';
//                }else{
//                    echo '<span>'.$category->name.'</span>';
//                    echo '<br>';
//                }
                array_push($filter,$category);
                test($category->id);
            }
        }else{
            return $filter;
        }

    }
}


if (!function_exists('getImageExtension')){
    function getImageExtension($image) {
        $extension=explode('.',$image);
        $extension=end($extension);
        return $extension;
    }
}

if (!function_exists('test2')) {
    function test2()
    {
        return test();
    }
}

if (!function_exists('slimGetImageName')) {
    function slimGetImageName($upload_path)
    {
        $ob = new Slim();
        $images = $ob->getImages();
        $image = $images[0];

        $name = $image['input']['name'];
        $data = $image['output']['data'];
        $file = $ob->saveFile($data, $name, $upload_path);
        return $image = $file['name'];
    }
}


if (!function_exists('subCategoryCheck')) {
    function subCategoryCheck($subCategory,$category)
    {
        $response=[];

        if (!empty(trim($subCategory))
            &&Category::where('id',$subCategory)->where('parent_id',$category)->where('status',1)->count()>0){



        }else{
            $response['category_'.$category]='Bos qala bilmez';
        }

        return $response;

    }
}



if (!function_exists('createThumb')){
    function createThumb($width,$height,$file_extension,$tmp_name,$target)
    {
        list($width,$height)=getimagesize($tmp_name);

        if($file_extension=='jpeg'||$file_extension=='jpg')
        {
            $new_file=imagecreatefromjpeg($tmp_name);
        }
        else if($file_extension=='png')
        {
            $new_file=imagecreatefrompng($tmp_name);
        }


        if (($width>$height)&&($width>600))
        {
            $new_width=120;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_height=(120/$width)*$height;
        }
        else if (($height>$width)&&($height>450))
        {
            $new_height=90;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_width=(90/$height)*$width;
        }
        else
        {
            $new_height=120;
            $new_width=120;
        }

        $truecolor=imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($truecolor,$new_file,0,0,0,0,$new_width,$new_height,$width,$height);

        if($file_extension=='jpeg'||$file_extension=='jpg')
        {
            imagejpeg($truecolor,$target,100);
        }
        else if($file_extension=='png')
        {
            imagepng($truecolor,$target,6);
        }



    }
}



if (!function_exists('createThumb2')){
    function createThumb2($width,$height,$file_extension,$tmp_name,$target)
    {
        list($width,$height)=getimagesize($tmp_name);

        if($file_extension=='jpeg'||$file_extension=='jpg')
        {
            $new_file=imagecreatefromjpeg($tmp_name);
        }
        else if($file_extension=='png')
        {
            $new_file=imagecreatefrompng($tmp_name);
        }


        if (($width>$height)&&($width>600))
        {
            $new_width=300;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_height=(300/$width)*$height;
        }
        else if (($height>$width)&&($height>450))
        {
            $new_height=235;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_width=(235/$height)*$width;
        }
        else
        {
            $new_height=300;
            $new_width=300;
        }

        $truecolor=imagecreatetruecolor($new_width,$new_height);
        imagecopyresampled($truecolor,$new_file,0,0,0,0,$new_width,$new_height,$width,$height);

        if($file_extension=='jpeg'||$file_extension=='jpg')
        {
            imagejpeg($truecolor,$target,100);
        }
        else if($file_extension=='png')
        {
            imagepng($truecolor,$target,6);
        }



    }
}




if (!function_exists('mainLimit')){
    function mainLimit($width,$height,$file_extension,$tmp_name,$target)
    {
        list($width,$height)=getimagesize($tmp_name);

        if($file_extension=='jpeg'||$file_extension=='jpg')
        {
            $new_file=imagecreatefromjpeg($tmp_name);
        }
        else if($file_extension=='png')
        {
            $new_file=imagecreatefrompng($tmp_name);
        }


        if (($width>$height)&&($width>1024))
        {
            $new_width=1024;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_height=(1024/$width)*$height;
            $truecolor=imagecreatetruecolor($new_width,$new_height);
            imagecopyresampled($truecolor,$new_file,0,0,0,0,$new_width,$new_height,$width,$height);
            if($file_extension=='jpeg'||$file_extension=='jpg')
            {
                imagejpeg($truecolor,$target,100);
            }
            else if($file_extension=='png')
            {
                imagepng($truecolor,$target,6);
            }

        }
        else if (($height>$width)&&($height>768))
        {
            $new_height=768;  //  heightin ve width uygun olaraq proporsional olmasi ucun
            $new_width=(768/$height)*$width;
            $truecolor=imagecreatetruecolor($new_width,$new_height);
            imagecopyresampled($truecolor,$new_file,0,0,0,0,$new_width,$new_height,$width,$height);
            if($file_extension=='jpeg'||$file_extension=='jpg')
            {
                imagejpeg($truecolor,$target,100);
            }
            else if($file_extension=='png')
            {
                imagepng($truecolor,$target,6);
            }

        }
        else
        {
            $sourcePath = $tmp_name;
            move_uploaded_file($sourcePath, $target);
        }



    }
}



if (!function_exists('seflink')) {

    function seflink($str, $options = array())
    {
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true
        );

        $options = array_merge($defaults, $options);

        $char_map = array(
            // Latin

            // Azerbaijan
            'Ç'=>'C',
            'ç'=>'c',
            'Ə'=>'E',
            'ə'=>'e',
            'Ğ'=>'G',
            'ğ'=>'g',
            'Ə'=>'E',
            'ə'=>'e',
            'I'=>'İ',
            'ı'=>'i',
            'Ö'=>'O',
            'ö'=>'o',
            'Ş'=>'S',
            'ş'=>'s',
            'Ü'=>'U',
            'ü'=>'u',
            //Azerbaijan

            //Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya'
            //Russian
        );

        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);

        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;

    }

}

