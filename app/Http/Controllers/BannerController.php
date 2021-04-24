<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Session;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('BackEnd.banner.banner-list', compact('banners'));
    }

    public function create()
    {
        return view('BackEnd.banner.banner-add');
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
                $img_path = public_path('Back/images/banner');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }


    public function store(Request $request)
    {
        $image_name = $this->Img($request);

        $banner = Banner::all()->count();
        if ($banner<7)
        {
            Banner::create([
                'title' => $request->title,
                'image' => $image_name,
            ]);
            return back()->with('sms','Banner Stored');
        }
        else
        {
            Session::flash('error', 'You can not create banner more then 7');
            return back();
        }


    }

    public function update(Banner $banner,Request $request)
    {

        $banner->id;

        $img_tmp = $request->file('image');

        if ($img_tmp) /* you can update with image */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/banner');
            $img_tmp->move($img_path,$img_name);

            $old_img = $banner->image;

            if(file_exists($old_img)){
                unlink($old_img);
            }
            $banner->title = $request->title;
            $banner->image = $img_name;
        }else{
            $banner->title = $request->title;
        }

        $banner->save();
        return back()->with('sms','Banner updated');
    }

    public function public(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = 1;
        $banner->save();
        return back()->with('sms','Banner available in public');
    }
    public function hide(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->status = 0;
        $banner->save();
        return back()->with('sms','Banner in private mode');
    }


    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return back()->with('sms','Banner destroyed');
    }
}
