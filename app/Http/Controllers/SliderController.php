<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Section;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('BackEnd.slider.manage_slider',compact('sliders'));
    }

    public function create()
    {
        $category = Section::with('categories')->get();
        $category = json_decode(json_encode($category),true);

        return view('BackEnd.slider.slider_create',compact('category'));
    }

    public function show ()
    {

    }
    protected function Img($request)
    {
        if($request->hasFile('image')){

            $img_tmp = $request->file('image');

            if ($img_tmp->isValid()){
                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
                $img_path = public_path('Back/images/slider');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }
    public function store (Request $request)
    {
        $request->validate([
           'image' => 'required',
           'category_id' => 'required',
        ]);

        $img_name = $this->Img($request);


        $slider = new Slider();
        $slider->image = $img_name;
        $slider->category_id = $request->category_id;
        $slider->save();
        return back()->with('sms','Slider Created');
    }

    public function hide($id)
    {
        $slide = Slider::find($id);
        $slide->status = 0;
        $slide->save();

        return back()->with('sms','Slider unavailable in public');
    }
    public function public($id)
    {
        $slide = Slider::find($id);
        $slide->status = 1;
        $slide->save();

        return back()->with('sms','Slider available in public');
    }

    public function edit(Slider $slider)
    {
        $category = Section::with('categories')->get();
        $category = json_decode(json_encode($category),true);
        return view('BackEnd.slider.slider_edit',compact('slider','category'));
    }

    public function update(Slider $slider, Request $request)
    {
        $slider->id;
        $img = $request->file('image');

        if ($img) /* you can update with image */
        {
            $img_exten = $img->getClientOriginalExtension();
            $img_name = $img->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/slider');
            $img->move($img_path,$img_name);

            $old_img = $slider->image;

            if(file_exists($old_img)){
                unlink($old_img);
            }
            $slider->category_id =  $request->category_id;
        }else{
            $slider->category_id =  $request->category_id;
        }
        $slider->save();
        return redirect()->route('slider.index')->with('sms','Slider Updated');
    }
    public function destroy(Slider $slider)
    {
       $slider->delete();
       return back()->with('sms','Slider Deleted');
    }
}
