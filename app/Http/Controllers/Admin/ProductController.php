<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryParameter;
use App\Models\Product;
use App\Models\ProductValue;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('pages.admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('status',1)->where('parent_id',0)->get();
        $stores=Store::where('status',1)->get();
        return view('pages.admin.product.add',compact('categories','stores'));
    }



    public function removeImage()
    {
        if(isset($_GET['image_name'])&&!empty($_GET['image_name']))
        {
            $target_thumb="uploads/announces/thumb/".$_GET["image_name"];
            $target_thumb2="uploads/announces/thumb2/".$_GET["image_name"];
            $target_announces="uploads/announces/".$_GET["image_name"];
            if (file_exists($target_thumb)&&file_exists($target_thumb2)&&file_exists($target_announces))
            {
                unlink($target_thumb);
                unlink($target_thumb2);
                unlink($target_announces);
                echo 'ok';
            }
            else
            {
                echo 'This file not exists !';
            }
        }
        else
        {
            echo 'Silme prosesi ucun post olunmadi !';
        }
    }



    public function rotateImage()
    {
        if(isset($_GET)&&isset($_GET['image_name'])&&isset($_GET['image_degree']))
        {
            $image_name=$_GET['image_name'];
            $image_degree=$_GET['image_degree'];
            $target_thumb="uploads/announces/thumb/".$image_name;
            $target_thumb2="uploads/announces/thumb2/".$image_name;
            $target_announces="uploads/announces/".$image_name;

            if (file_exists($target_thumb)&&file_exists($target_thumb2)&&file_exists($target_announces))
            {
                rotateImage($image_degree,$target_thumb);
                rotateImage($image_degree,$target_thumb2);
                rotateImage($image_degree,$target_announces);
                echo 'ok';
            }
            else
            {
                echo 'This file not exists !';
            }

        }
        else
        {
            echo 'no posted degree';
        }

    }



    public function addAnnounce(Request $request)
    {
        if(isset($_FILES["file"]["type"]))
        {
            $file=$_FILES['file'];
            $tmp_name=$file['tmp_name'];
            $image_info=getimagesize($tmp_name); //sekil melumatlari .
            $image_width = $image_info[0]; //original seklin width olcusu .
            $image_height = $image_info[1]; //original seklin height olcusu .
            $validextensions = array("image/jpeg", "image/jpg", "image/png");
            $temporary = explode(".", $file["name"]); //noqteye gore seklin adini ayirir .
            $file_extension = strtolower(end($temporary)); //sonuncu noqteden sonraki hisseni goturur.
            $file_type=$file['type'];
            if (in_array($file_type,$validextensions))
            {
                $file_name_without_ext='gunluk_evler_' . uniqid() . rand();
                $file_new_name = $file_name_without_ext . '.' . $file_extension;

                $target_dir_thumb = 'uploads/announces/thumb/'; //seklin atilacagi unvan
                $target_thumb=$target_dir_thumb.$file_new_name; //seklin atilacagi unvan+seklin yeni adi .

                $target_dir_thumb2 = 'uploads/announces/thumb2/'; //seklin atilacagi unvan
                $target_thumb2=$target_dir_thumb2.$file_new_name; //seklin atilacagi unvan+seklin yeni adi .

                $target_dir_announces ='uploads/announces/'; //seklin atilacagi unvan
                $target_announces=$target_dir_announces.$file_new_name; //seklin atilacagi unvan+seklin yeni adi .

                createThumb($image_width,$image_height,$file_extension,$tmp_name,$target_thumb);
                createThumb2($image_width,$image_height,$file_extension,$tmp_name,$target_thumb2);
                mainLimit($image_width,$image_height,$file_extension,$tmp_name,$target_announces);
                echo $target_thumb.'&'.$_POST['file_row']; //sekilin upload oldugu sirani gonderirem ki , view'de sirayla gosderim .
            }
        }
        else
        {
            echo 'no';
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){
        $i=0;
        $response=[];
        $parameters_for_db=[];
        $now=Carbon::now();
        $current_year=$now->year;
        $current_month=$now->month;
        $images='';

        if (!empty(trim($request->store))&&in_array($request->store,Store::where('status',1)->pluck('id')->toArray())){
            $store=$request->store;
        }else{
            $response['store']='Bos qala bilmez';
        }


        $categories_count=count($request->category);

        if ($request->has('category')&&$categories_count==3){

            $categories_form=$request->category;

            $category_ids_db=Category::select('id')->where('status',1)->pluck('id')->toArray();

            for($i;$i<$categories_count;$i++){

                if (in_array($categories_form[$i],$category_ids_db)){

                    if ($i==0){

                        if (Category::where('status',1)->where('id',$categories_form[$i])->where('parent_id',0)->exists()){

                        }else{
                            $response['category_'.$categories_form[$i]]='Ilk kateqoriyanin parent_id-si 0 olmalidir !';
                        }

                    }else{

                        if (Category::where('status',1)->where('id',$categories_form[$i])->where('parent_id',$categories_form[$i-1])->count()>0){

                            if ($i==$categories_count-1) { //sonuncu , parameterli category

                                $category_find = Category::find($categories_form[$i]);

                                if (count($category_find->parameters)>0){

                                    $product_category = $categories_form[$i];

                                    foreach ($category_find->parameters as $parameter) {

                                        if ($request->has($parameter->name)) {

                                            if (count($parameter->values) == 0) {
                                                if (!empty(trim($request->input($parameter->name)))) {
                                                    $parameters_for_db[$parameter->id] = $request->input($parameter->name);
                                                } else {
                                                    $response[$parameter->name] = 'Bos qala bilmez';
                                                }
                                            } else {

                                                if (!empty(trim($request->input($parameter->name))) && in_array($request->input($parameter->name), $parameter->parameter_values_names())) {

                                                    $parameters_for_db[$parameter->id] = $request->input($parameter->name);

                                                } else {
                                                    $response[$parameter->name] = 'Bos qala bilmez';
                                                }

                                            }

                                        } else {
                                            $response[$parameter->name] = $parameter->name . ' parametri formdan gelmeyib !';
                                        }

                                    }

                                }else{
                                    $response['category_'.$categories_form[$i]]='category_'.$categories_form[$i].' parametr yuklemek icazesi olmalidir !';
                                }

                            }

                        }else{
                            $response['category_'.$categories_form[$i]]='Ust kateqoriya bir alt kateqoriyanin parenti olmalidir !';
                        }

                    }

                }else{
                    $response['category']='Alt kateqoriyalar tam sekilde secilmeyib ';
                }

            }

        }else{
            $response['category']='Mehsul yukleye bilmezsiniz !';
        }



        if (!empty(trim($request->name))){
            $name=$request->name;
        }else{
            $response['name']='Bos qala bilmez';
        }

        if (!empty(trim($request->text))){
            $text=$request->text;
        }else{
            $response['text']='Bos qala bilmez';
        }

        if (!empty(trim($request->quantity))&&filter_var($request->quantity,FILTER_VALIDATE_INT)){
            $quantity=$request->quantity;
        }else{
            $response['quantity']='Bos qala bilmez';
        }


        if (empty($request->image_names)){
            $response['images']='Bos qala bilmez';
        }
        else{
            $image_names=explode(',',$request->image_names);
            if (count($image_names)<4)
            {
                $response['images']='En azi 4 sekil secmelisiniz';
            }else{

                foreach ($image_names as $img){

                    $target_thumb="uploads/announces/thumb/".$img;
                    $target_thumb2="uploads/announces/thumb2/".$img;
                    $target_announces="uploads/announces/".$img;

                    if (!(file_exists($target_thumb)&&file_exists($target_thumb2)&&file_exists($target_announces))){
                        $response['images']='Yoxdur';
                    }
                }
            }

        }


        if (count($response)==0){

            $product_insert=Product::create([
               'category_id'=>$product_category,
               'store_id'=>$store,
               'name'=>$name,
               'text'=>$text,
               'created_at'=>$now,
               'updated_at'=>$now,
               'quantity'=>$quantity
            ]);

            foreach ($parameters_for_db as $key=>$value){
               ProductValue::create([
                   'product_id'=>$product_insert->id,
                   'category_parameter_id'=>CategoryParameter::where('category_id',$product_category)->where('parameter_id',$key)->first('id')->id,
                   'value'=>$value,
               ]);
            }



            if (!file_exists('uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id)) {
                mkdir('uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id, 0777, true);
            }

            foreach ($image_names as $image_name)
            {
                $target_announces="uploads/announces/".$image_name;
                $image_extension=getImageExtension($image_name);

                    copy($target_announces,'uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id.'/'.$image_name);

                    if ($image_extension=='jpeg'||$image_extension=='jpg'){
                        imagecreatefromjpeg('uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id.'/'.$image_name);
                    }

                    if ($image_extension=='png'){
                        imagecreatefrompng('uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id.'/'.$image_name);
                    }

                    $images.='uploads/announces/'.$current_year.'/'.$current_month.'/'.$product_insert->id.'/'.$image_name.',';

            }

            $images=rtrim($images,',');
            $update_images=Product::findOrFail($product_insert->id);
            $update_images->images=$images;
            $update_images->save();


            $response['success']='Ugurla elave olundu !';

        }


        return response()->json($response);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
