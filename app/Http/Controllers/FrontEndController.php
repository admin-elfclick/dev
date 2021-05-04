<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Content;
use App\Models\Partner;
use App\Models\Product;
use App\Models\SiteInfo;
use App\Models\Slider;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    public function home()
    {
        $data['sliders'] = Slider::where('status',1)->limit(4)->get();
        $data['banners'] = Banner::where('status',1)->latest()->limit(4)->get();
        $data['categoryFo'] = Category::where('status',1)->latest()->limit(4)->get();
        $data['siteInfo'] = SiteInfo::first();

        return view('FrontEnd.pages.home',$data);
    }

    public function search()
    {
        $searchItem = \request()->query('query');
        $searchPro = Product::where('product_name', 'LIKE', "%{$searchItem}%")->get();
        return view('FrontEnd.pages.searchItem',compact('searchPro'));
    }

    public function proView(Product $product)
    {
        /*$product->id;*/

        $category_id = $product->category_id;

        $relatedProduct = Product::where('category_id',$category_id)
                                ->where('id','!=',$product->id)
                                ->latest()
                                ->get();
        $auth = Auth::user();
        if (!empty($auth)) {
        DB::table('activities')
        ->insert([
          'user_id' => Auth::id(),
          'product_id' => $product->id,
        ]);
      }

        return view('FrontEnd.product.product_view',compact('product','relatedProduct'));
    }

    public function CateAll()
    {
        $category = Category::where('status',1)->latest()->get();
        return view('FrontEnd.pages.categories',compact( 'category'));
    }

    public function catePro($category_id)
    {
       $category = Category::find($category_id);
       if (empty($category)) {
         $category = Category::where('section_id', $category_id)->first();
       }
        $products = Product::where('category_id',$category_id)->orderBy('id','desc')->get();
        return view('FrontEnd.product.catePro',compact('products', 'category'));
    }

    public function rangeSelect(Request $request)
    {
        $category = Category::find($request->category_id);
        if (empty($category)) {
          $category = Category::where('section_id', $category_id)->first();
        }
        $products = Product::where('category_id',$category->id)->where('product_price', '<=', $request->l_price)->get();
        return view('FrontEnd.product.catePro',compact('products', 'category'));
    }
    public function contentPro($content_id)
    {
        $content = Content::find($content_id);
        $products = Product::where('content_id',$content_id)->orderBy('id','desc')->get();
        /*dd($products);*/
        return view('FrontEnd.product.contentPro',compact('products', 'content'));
    }

    public function bannerPro($banner_id)
    {
        $banner = Banner::find($banner_id);
        $products = Product::where('banner_id',$banner_id)->orderBy('id','desc')->get();
        /*dd($products);*/
        return view('FrontEnd.product.bannerPro',compact('products', 'banner'));
    }

    public function contact()
    {
        return view('FrontEnd.pages.contact');
    }
    public function about()
    {
        return view('FrontEnd.pages.about');
    }
}
