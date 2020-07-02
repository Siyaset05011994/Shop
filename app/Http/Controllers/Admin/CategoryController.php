<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryInsertRequest;
use App\Models\Category;
use App\Models\CategoryParameter;
use App\Models\Parameter;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('pages.admin.category.index',compact('categories'));
    }

    public function getSubCategories(Request $request){
        $categories=Category::where('parent_id',$request->category_id)->get();
        $parameter_ids=CategoryParameter::select('parameter_id')->where('category_id',$request->category_id)->pluck('parameter_id');
        $parameters=Parameter::whereIn('id',$parameter_ids)->with('values')->get();
        return response()->json(['categories'=>$categories,'parameters'=>$parameters]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereParentId(0)->get();
        return view('pages.admin.category.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryInsertRequest $request)
    {
        $categoryData=[
            'name'=>$request->name,
            'seo_url'=>seflink($request->name)
        ];

        if ($request->has('parent_id')){
            $categoryData['parent_id']=$request->parent_id;
        }

        if ($request->has('parameter_exists')){
            $categoryData['parameter_exists']=$request->parameter_exists;
        }

        Category::create($categoryData);

        return redirect()->route('admin.category.index');
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


    public function getAddRemoveParametr($id){

        $category=Category::where('status',1)->where('id',$id)->first();

        if ($category===null||$category->parameter_exists!=1){
            return abort(404);
        }

        $category_parameter_ids=CategoryParameter::where('category_id',$id)->pluck('parameter_id')->toArray();
        $parameters=Parameter::where('status',1)->get();
        return view('pages.admin.category.add_remove_parameter',compact('category','parameters','category_parameter_ids'));
    }

    public function addRemoveParametr($id,Request $request){

        $category=Category::where('id',$id)->where('status',1)->where('parameter_exists',1)->first();

        if ($category!==null){

            if ($request->has('parameter')){

                foreach ($request->parameter as $parameter){

                    if (Parameter::withStatusFind(1,$parameter)!==null){

                        if (CategoryParameter::where('category_id',$id)->where('parameter_id',$parameter)->count()==0){

                            CategoryParameter::create([
                                'category_id'=>$id,
                                'parameter_id'=>$parameter
                            ]);

                        }

                    }

                }

                CategoryParameter::where('category_id',$id)->whereNotIn('parameter_id',$request->parameter)->delete();

            }else{

                CategoryParameter::where('category_id',$id)->delete();

            }

            return redirect()->route('admin.category.index');

        }

        return abort(404);
    }
}
