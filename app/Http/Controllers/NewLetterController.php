<?php

namespace App\Http\Controllers;

use App\Models\NewLetter;
use Illuminate\Http\Request;

class NewLetterController extends Controller
{
    public function index()
    {
        $news = NewLetter::latest()->get();

        return view('BackEnd.newsLetter.news-list',compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'email' => 'unique:new_letters'
        ]);

        NewLetter::create($request->only('email'));

        return back();
    }

    public function destroy()
    {
        //
    }
}
