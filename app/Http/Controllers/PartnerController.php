<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::latest()->get();
        return view('BackEnd.partner.partner-list', compact('partner'));
    }

    public function create()
    {
        return view('BackEnd.partner.partner-add');
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
                $img_path = public_path('Back/images/partner');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }


    public function store(Request $request)
    {
        $img_name = $this->Img($request);

        Partner::create([
            'image' => $img_name,
            'link' => $request->link
        ]);

        return back()->with('sms','Partner Stored');
    }

    public function update(Partner $partner,Request $request)
    {

        $partner->id;

        $img_tmp = $request->file('image');

        if ($img_tmp)
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/partner');
            $img_tmp->move($img_path,$img_name);
            $old_img = $partner->image;
            if(file_exists($old_img)){
                unlink($old_img);
            }
            $partner->image = $img_name;
            $partner->link = $request->link;
        }else{
            $partner->link = $request->link;
        }

        $partner->save();

        return back()->with('sms','Partner updated');
    }

    public function public(Request $request)
    {
        $part = Partner::find($request->id);
        $part->status = 1;
        $part->save();
        return back()->with('sms','Partner available in public');
    }
    public function hide(Request $request)
    {
        $part = Partner::find($request->id);
        $part->status = 0;
        $part->save();
        return back()->with('sms','Partner in private mode');
    }


    public function destroy($id)
    {
        $part = Partner::find($id);
        $part->delete();
        return back()->with('sms','Partner destroyed');
    }
}
