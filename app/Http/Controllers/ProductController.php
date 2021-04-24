<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Content;
use App\Models\Country;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('BackEnd.product.pro_list',compact('products'));
    }

    public function create()
    {
        $countries = Country::where('status',1)->get();
        $content = Content::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        $category = Section::with('categories')->get();
        $category = json_decode(json_encode($category),true);

//        echo "<pre>"; print_r($category); die;

        return view('BackEnd.product.pro_add',compact('category', 'countries', 'content','banner'));
    }

    protected function proImg($request)
    {
        if($request->hasFile('product_img')){
            $img_tmp = $request->file('product_img');
            if ($img_tmp->isValid()){
                $img_exten = $img_tmp->getClientOriginalExtension();
                /*$img_name = rand().'.'.$img_exten;*/ // generate new img name
                $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;

                $img_path = public_path('Back/images/Product');
                $img_tmp->move($img_path,$img_name);

                return $img_name;
            }
        }

    }

    public function store(Product $product, Request $request)
    {
        $request->validate([
           'product_name' => ['required', 'max:255'],
           'slug' => 'unique:products',
           'product_price' => ['required'],
           'product_link' => 'required',
           'category_id' => 'required',
           'product_meta_description' => 'required',
           'product_description' => 'required',
        ]);

        $img_name  = $this->proImg($request);

        // multiple image upload
      /*  if ($request->hasFile('product_multiple_img'))
        {
            foreach ($request->file('product_multiple_img') as $image)
            {
                $name  =  $image->getClientOriginalName();
                $directory  =   public_path('Back/images/Product/multiple');
                $image->move($directory,$name);
                $data[] =   $directory.$name;
            }
        }*/

        /* ===== Save other field in product table =========== */
        $product->create([
            'product_name' =>  $request->product_name,
            'slug' =>  str_slug($request->product_name),
            'product_price' =>  $request->product_price,
            'product_price_old' =>  $request->product_price_old,
            'keyword' =>  $request->keyword,
           /* 'product_multiple_img' =>  json_encode($data),*/
            'product_link' =>  $request->product_link,
            'product_img' =>  $img_name,
            'country_id' =>  $request->country_id,
            'content_id' =>  $request->content_id,
            'banner_id' =>  $request->banner_id,
            'category_id' =>  $request->category_id,
            'product_meta_description' =>  $request->product_meta_description,
            'product_description' =>  $request->product_description,
        ]);

        return back()->with('sms','Product Stored');
    }

    public function edit(Product $product)
    {
        $category = Section::with('categories')->get();
        $category = json_decode(json_encode($category),true);
        $countries = Country::where('status',1)->get();
        $content = Content::where('status',1)->get();
        $banner = Banner::where('status',1)->get();
        return view('BackEnd.product.pro_edit',compact('product', 'category', 'countries', 'content','banner'));
    }

    public function update(Product $product, Request $request)
    {
        $product->id;
        $img_tmp = $request->file('product_img');

        if ($img_tmp) /* you can update with image */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/Product');
            $img_tmp->move($img_path,$img_name);

            $old_img = $product->product_img;
            if (file_exists($old_img))
            {
                unlink($old_img);
            }
            $product->product_name  =   $request->product_name;
            $product->slug  =  str_slug($request->product_name);
            $product->product_price  =   $request->product_price;
            $product->product_price_old  =   $request->product_price_old;
            $product->product_link =  $request->product_link;
            $product->country_id =  $request->country_id;
            $product->category_id =  $request->category_id;
            $product->content_id =  $request->content_id;
            $product->banner_id =  $request->banner_id;
            $product->product_meta_description =  $request->product_meta_description;
            $product->product_description =  $request->product_description;
        }
        else /* you can update without image */
        {
            $product->product_name = $request->product_name;
            $product->slug  =  str_slug($request->product_name);
            $product->product_price  =   $request->product_price;
            $product->product_price_old  =   $request->product_price_old;
            $product->product_link =  $request->product_link;
            $product->country_id =  $request->country_id;
            $product->category_id =  $request->category_id;
            $product->content_id =  $request->content_id;
            $product->banner_id =  $request->banner_id;
            $product->product_meta_description =  $request->product_meta_description;
            $product->product_description =  $request->product_description;
        }
        $product->save();
        return redirect()->route('product.index')->with('sms', 'Product Updated!');
    }

    public function active($id)
    {
        $pro = Product::find($id);
        $pro->status = 1;
        $pro->save();
        return back()->with('sms','Product available in public');
    }
    public function inactive($id)
    {
        $pro = Product::find($id);
        $pro->status = 0;
        $pro->save();
        return back()->with('sms','Product unavailable in public');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('sms','Product Deleted');
    }
}
