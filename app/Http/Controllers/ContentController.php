<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Session;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::latest()->get();
        return view('BackEnd.content.content-list', compact('contents'));
    }

    public function create()
    {
        return view('BackEnd.content.content-add');
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        $content = Content::all()->count();

        if ($content <5)
        {
            Content::create($request->only('title'));

            return back()->with('sms','Content Stored');
        }
        else
        {
            Session::flash('error', 'You can not create content more then 5');
            return back();
        }

    }

    public function update(Content $content,Request $request)
    {

        $content->update($request->only('title'));

        return back()->with('sms','Content updated');
    }

    public function public(Request $request)
    {
        $section = Content::find($request->id);
        $section->status = 1;
        $section->save();
        return back()->with('sms','Content available in public');
    }
    public function hide(Request $request)
    {
        $section = Content::find($request->id);
        $section->status = 0;
        $section->save();
        return back()->with('sms','Content in private mode');
    }


    public function destroy($id)
    {
        $section = Content::find($id);
        $section->delete();
        return back()->with('sms','Content destroyed');
    }
}
