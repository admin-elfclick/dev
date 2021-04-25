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

    public function store(Request $request)
    {
        Section::create($request->only('name'));

        return back()->with('sms','Category Stored');
    }

    public function update(Section $section,Request $request)
    {

        $section->update($request->only('name'));

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
