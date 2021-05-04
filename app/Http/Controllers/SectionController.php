<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::latest()->get();
        return view('BackEnd.section.section-list', compact('sections'));
    }

    public function create()
    {
        return view('BackEnd.section.section-add');
    }

    public function show()
    {
        //
    }

    protected function Img($request)
    {
        if($request->hasFile('image')){

            $img_tmp = $request->file('image');

            if ($img_tmp->isValid()){
                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
                $img_path = public_path('Back/images/section');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }

    public function store(Request $request)
    {
        $image = $this->Img($request);

        Section::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return back()->with('sms','Category Stored');
    }

    public function update(Section $section,Request $request)
    {

//        $section->update($request->only('name'));
        $section->id;

//        $section = Section::find($request->id);

        $img_tmp = $request->file('image');



        if ($img_tmp) /* you can update with image */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/section');
            $img_tmp->move($img_path,$img_name);

            $old_img = $section->image;

            if(file_exists($old_img)){
                unlink($old_img);
            }
            $section->image = $img_name;
            $section->name = $request->name;

        }else{
            $section->name = $request->name;

        }

        $section->save();

        return back()->with('sms','Category updated');
    }

    public function active(Request $request)
    {
        $section = Section::find($request->id);
        $section->status = 1;
        $section->save();
        return back()->with('sms','Category available in public');
    }
    public function inactive(Request $request)
        {
            $section = Section::find($request->id);
            $section->status = 0;
            $section->save();
            return back()->with('sms','Category in private mode');
        }


    public function destroy($id)
    {
        $section = Section::find($id);
        $section->delete();
        return back()->with('sms','Category destroyed');
    }


}
