<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Constraint\FileExists;

class ProductController extends Controller
{
    public function index()
    {

        $itemsPerPage = 7;
        $category = Category::all();
        // dd($category);
        $product = Product::orderBy('created_at', 'desc')->paginate($itemsPerPage);
        return view('admin.product.index', array('products' => $product, 'title' => 'Products Display', 'category' => $category) );
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', ['category' => $category]);
    }

    public function insert(Request $request)
    {
        $product = new Product();

        if($request->hasFile('image'))
            {

                $files = $request->file('image');
                $extension = $files->getClientOriginalExtension();
                $fileName = 'product_' . time() . '.' . $extension;

                $location = 'assets/images/uploads/product/';
                $files->move($location, $fileName);
                $imageLocation = $location . $fileName;

                $product->image = $imageLocation;
            }

            // if(!empty($request->input('category_id')))
            // {
            //     $request->input('category_id');
            // }else{
            //     $request->input('');
            // }

            $product->category_id = $request->category_id == null ? " " : $product->input('category_id');


            // $product->category_id = $request->has('category_id') ?  ;
            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->small_description = $request->input('s_descrip');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price  = $request->input('selling_price');
            $product->qty  = $request->input('qty');
            $product->tax  = $request->input('tax');
            $product->status = $request->input('status') == TRUE ? '1' : 0 ;
            $product->trending = $request->input('trending') == TRUE ? '1' : 0 ;
            $product->meta_title = $request->input('meta_title');
            $product-> 	meta_description = $request->input('meta_descrip');
            $product->meta_keywords = $request->input('meta_keywords');



            $product->save();
            return redirect('/products')->with('status', 'Product Successfully Added',  "success");

    }

    public function edit(Request $request, $id)
    {
        $products = Product::findOrNew($id);
        // dd($products);
        $data = array(
            'product' => $products,
            );
        return view('admin.product.edit',$data);

    }

    public function update(Request $request, $id)
    {

        $category_update = Product::findOrFail($id);

        if($request->hasFile('image'))
            {
                // dd($request->hasFile('image'));

                $path = $category_update->image;
                // dd($path);
                if(File::exists($path))
                {
                    File::delete($path);

                }

                $files = $request->file('image');
                $extension = $files->getClientOriginalExtension();
                $fileName = 'category_' . time() . '.' . $extension;

                $location = 'assets/images/uploads/category/';
                $files->move($location, $fileName);
                $imageLocation = $location . $fileName;

                $category_update->image = $imageLocation;
            }
        else{

        }



            $category_update->name = $request->input('name');
            $category_update->slug = $request->input('slug');
            $category_update->description = $request->input('description');
            $category_update->small_description = $request->input('s_descrip');
            $category_update->original_price = $request->input('original_price');
            $category_update->selling_price = $request->input('selling_price');
            $category_update->qty = $request->input('qty');
            $category_update->tax = $request->input('tax');
            $category_update->status = $request->input('status') == TRUE ? '1' : 0 ;
            $category_update->trending= $request->input('trending') == TRUE ? '1' : 0 ;
            $category_update->meta_title = $request->input('meta_title');
            $category_update->meta_description = $request->input('meta_descrip');
            $category_update->meta_keywords = $request->input('meta_keywords');


        $category_update->save();
		// Session::flash('flash_message', 'Category updated successfully!');

		return redirect('products')->with("status", "Category Deleted Successfully", "warning");


            // return redirect('/categories')->with('success', 'Category Successfully Added');


    }

    public function delete($id)
    {
        $delete_product =  Product::findOrFail($id);

        $file = $delete_product->image;
        // dd($file);
        if(File::exists($file))
        {
            File::delete($file);
        }

        $delete_product->delete();

        return redirect('products')->with('success', 'Products Deleted Successfully', 'success');

    }


}
