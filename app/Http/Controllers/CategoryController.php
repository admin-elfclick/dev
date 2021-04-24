<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cates = Category::latest()->with(['section','parent'])->get();

        return view('BackEnd.category.cate-list',compact('cates'));
    }

    public function create()
    {
        $data['sections'] = Section::where('status',1)->get();

        return view('BackEnd.category.cate-add',$data);
    }

    protected function Img($request)
    {
        if($request->hasFile('category_img')){

            $img_tmp = $request->file('category_img');

            if ($img_tmp->isValid()){
                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
                $img_path = public_path('Back/images/category');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }

    public function store(Request $request)
    {
        $img_name = $this->Img($request);

        Category::create([
            'category_img' => $img_name,
            'section_id' => $request->section_id,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
        ]);

        return back()->with('sms','Sub-Category Stored');
    }

    public function categoryLevel(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            $getCategories = Category::where(['section_id' => $data['section_id'], 'parent_id' => 0,  'status' => 1])->get();
            $getCategories = json_decode(json_encode($getCategories),true);
            //echo "<pre>"; print_r($getCategories); die;
            return view('BackEnd.category.cate-append')->with(compact('getCategories'));
        }
    }

    public function edit($id)
    {
        $cate = Category::find($id);
        $sections = Section::where('status',1)->get();
        $getCategories = Category::with('subCategories')->where(['parent_id' => 0, 'section_id' => $cate['section_id']])->get();
        /*  $getCategories = json_decode(json_encode($getCategories),true);
          echo "<pre>"; print_r($getCategories); die;*/

        return view('BackEnd.category.cate-edit',compact('cate', 'sections', 'getCategories'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);

        $img_tmp = $request->file('category_img');

        if ($img_tmp) /* you can update with image */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/category');
            $img_tmp->move($img_path,$img_name);
            $old_img = $category->category_img;
            if(file_exists($old_img)){
                unlink($old_img);
            }
            $category->category_img = $img_name;
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->section_id = $request->section_id;
        }else{
            $category->name = $request->name;
            $category->parent_id = $request->parent_id;
            $category->section_id = $request->section_id;
        }

        $category->save();
        return redirect()->route('category.index')->with('sms','Sub-Category Updated');
    }

    public function active($id)
    {
        $section = Category::find($id);
        $section->status = 1;
        $section->save();
        return back()->with('sms','Sub-Category available in public');
    }
    public function inactive($id)
        {
            $section = Category::find($id);
            $section->status = 0;
            $section->save();
            return back()->with('sms','Sub-Category unavailable in public');
        }

    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('category.index')->with('sms','Sub-Category Updated');
    }

}
