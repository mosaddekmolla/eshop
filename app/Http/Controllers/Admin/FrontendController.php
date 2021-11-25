<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $features_products = Product::where('trending', '1')->take(10)-> get();
        $trending_products = Product::where('status', '1')->take(10)->get();


        return view('Frontend.index', compact('features_products', 'trending_products'));
    }

    public function category()
    {
        $category_details = Category::all();
        // dd($category_details);
        return view('Frontend.category-products', compact('category_details'));
    }

    public function category_products_view($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug) -> firstOrFail();
            $products = Product::where('category_id', $category->id)->where('status', '1')->get();
            // dd($products);
            return view('Frontend.category_products_view', compact('category', 'products'));
        }
        else{
            return redirect('/')->with('status', 'Slug doesnot found');
        }


    }

    public function product_details($category_slug, $product_slug)
    {
        // dd($category_slug, $product_slug);

        if(Category::where('slug', $category_slug)->exists())
        {
            if(Product::where('slug', $product_slug)->exists())
            {
                $category = Category::where('slug', $category_slug)->first();
                $product_details = Product::where('slug', $product_slug)->first();
                return view('Frontend.product_details', compact('category','product_details'));
            }
        }
        else{
            return redirect('/')->with('status', 'No Products Found');
        }

        // $product_details = Product::findOrFail($product_slug);
        // dd($product_details);
        // return view('Frontend.product_details', compact('product_details'));

    }
}
