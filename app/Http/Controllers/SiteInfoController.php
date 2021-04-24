<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Content;
use App\Models\CustomerMessage;
use App\Models\TopAds;
use Illuminate\Http\Request;
use App\Models\SiteInfo;
use Session;

class SiteInfoController extends Controller
{
    public function index()
    {
        $siteInfo = SiteInfo::latest()->get();
        return view('BackEnd.siteInfo.siteInfo-list', compact('siteInfo'));
    }

    public function create()
    {
        return view('BackEnd.siteInfo.siteInfo-add');
    }

    public function show()
    {
        //
    }

    protected function Img($request)
    {
        if($request->hasFile('logo')){

            $img_tmp = $request->file('logo');

            if ($img_tmp->isValid()){
                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
                $img_path = public_path('Back/images/logo');
                $img_tmp->move($img_path,$img_name);
                return $img_name;
            }
        }
    }


    public function store(Request $request)
    {
        $logo_name = $this->Img($request);

        $siteInfo = SiteInfo::all()->count();
        if ($siteInfo<1)
        {
            SiteInfo::create([
                'title' => $request->title,
                'description' => $request->description,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'youtube_link' => $request->youtube_link,
                'twitter_link' => $request->twitter_link,
                'play_store_link' => $request->play_store_link,
                'app_store_link' => $request->app_store_link,
                'logo' => $logo_name,
            ]);
            return back()->with('sms','SiteInfo Stored');
        }
        else
        {
            Session::flash('error', 'You can not create site Info more then 1');
            return back();
        }
    }

    public function edit (SiteInfo $siteInfo, Request $request)
    {
        $siteInfo = SiteInfo::find($request->id);

        return view('BackEnd.siteInfo.siteInfo-edit',compact('siteInfo'));
    }

    public function update(SiteInfo $siteInfo,Request $request)
    {
        $siteInfo->id;

        $img_tmp = $request->file('logo');

        if ($img_tmp) /* you can update with logo */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/logo');
            $img_tmp->move($img_path,$img_name);

            $old_img = $siteInfo->logo;

            if(file_exists($old_img)){
                unlink($old_img);
            }
            $siteInfo->title = $request->title;
            $siteInfo->logo = $img_name;
            $siteInfo->description = $request->description;
            $siteInfo->phone_number = $request->phone_number;
            $siteInfo->email = $request->email;
            $siteInfo->facebook_link = $request->facebook_link;
            $siteInfo->instagram_link = $request->instagram_link;
            $siteInfo->youtube_link = $request->youtube_link;
            $siteInfo->twitter_link = $request->twitter_link;
            $siteInfo->play_store_link = $request->play_store_link;
            $siteInfo->app_store_link = $request->app_store_link;

        }else{
            $siteInfo->title = $request->title;
            $siteInfo->description = $request->description;
            $siteInfo->phone_number = $request->phone_number;
            $siteInfo->email = $request->email;
            $siteInfo->facebook_link = $request->facebook_link;
            $siteInfo->instagram_link = $request->instagram_link;
            $siteInfo->youtube_link = $request->youtube_link;
            $siteInfo->twitter_link = $request->twitter_link;
            $siteInfo->play_store_link = $request->play_store_link;
            $siteInfo->app_store_link = $request->app_store_link;
        }
        $siteInfo->update();
        return back()->with('sms','SiteInfo updated');
    }


    public function destroy($id)
    {
        $siteInfo = SiteInfo::find($id);
        $siteInfo->delete();
        return back()->with('sms','SiteInfo destroyed');
    }

    public function cus_sms()
    {
        $customer = CustomerMessage::latest()->get();
        return view('BackEnd.include.cus_sms_list',compact('customer'));
    }

    public function cus_sms_store(Request $request)
    {
        CustomerMessage::create($request->all());

        return back()->with('message', 'Thanks for your message..!');
    }

    public function cus_sms_del($id)
    {
        $cus = CustomerMessage::find($id);
        $cus->delete();
        return back()->with('sms','Message deleted');
    }

    public function ads_show()
    {
        $ads = TopAds::all();

        return view('BackEnd.top-ads.top-ads-list',compact('ads'));
    }
    public function ads_create()
    {
        return view('BackEnd.top-ads.top-ads');
    }

    protected function adsImg($request)
    {
        if ($request->hasFile('image')) {

            $img_tmp = $request->file('image');

            if ($img_tmp->isValid()) {
                $img_exten = $img_tmp->getClientOriginalExtension();
                $img_name = $img_tmp->getClientOriginalName() . '.' . $img_exten;
                $img_path = public_path('Back/images/ads');
                $img_tmp->move($img_path, $img_name);
                return $img_name;
            }
        }
    }

    public function adsStore(Request $request)
    {
       $imgName  = $this->adsImg($request);

        $topAds = TopAds::all()->count();
        if ($topAds<1) {
            TopAds::create([
                'image' => $imgName
             ]);
            return back()->with('sms','Site top ads stored');
        }
        else
        {
            Session::flash('error', 'You can not create site top ads more then 1');
            return back();
        }
    }

    public function adsUpdate(Request $request,$id)
    {
     $ads = TopAds::find($id);

        $img_tmp = $request->file('image');

        if ($img_tmp) /* you can update with logo */ {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/ads');
            $img_tmp->move($img_path,$img_name);

            $old_img = $ads->image;

            if (file_exists($old_img)) {
                unlink($old_img);
            }
            $ads->image = $img_name;
            $ads->save();
        }

        return back()->with('sms','Site top ads updated');

    }
    public function ads_del($id)
    {
        $ads = TopAds::find($id);
        $ads->delete();
        return back()->with('sms','Site top ads deleted');
    }
}
