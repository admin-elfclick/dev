<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::latest()->get();
        return view('BackEnd.country.country_list', compact('countries'));
    }

    public function create()
    {
        return view('BackEnd.country.country_add');
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        Country::create($request->only('name'));

        return back()->with('sms','Country Stored');
    }

    public function update(Country $country,Request $request)
    {

        $country->update($request->only('name'));

        return back()->with('sms','Country updated');
    }

    public function active(Request $request)
    {
        $country = Country::find($request->id);
        $country->status = 1;
        $country->save();
        return back()->with('sms','Country available in public');
    }
    public function inactive(Request $request)
    {
        $country = Country::find($request->id);
        $country->status = 0;
        $country->save();
        return back()->with('sms','Country in private mode');
    }


    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return back()->with('sms','Country destroyed');
    }
}
