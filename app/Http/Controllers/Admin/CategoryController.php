<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        // dd($category);

        $itemsPerPage = 7;
        $category = Category::orderBy('created_at', 'desc')->paginate($itemsPerPage);
        return view('admin.category.index', array('categories' => $category, 'title' => 'Categories Display')); 
        
        // $category  =   Category::paginate(3);
        // return view('admin.category.index', ['categories' => $category] );
    }

    public function add()
    {
        return view('admin.category.add');
    }


    public function insert(Request $request)
    {
        $category = new Category;

        if($request->hasFile('image'))
            {
                
                $files = $request->file('image');
                $extension = $files->getClientOriginalExtension();
                $fileName = 'category_' . time() . '.' . $extension;

                $location = '/images/uploads/category/';
                $files->move(public_path() . $location, $fileName);
                $imageLocation = $location . $fileName;
                    
                $category->image = $imageLocation;
            }


            $category->name = $request->input('name');
            $category->slug = $request->input('slug');
            $category->description = $request->input('description');
            $category->status = $request->input('status') == TRUE ? '1' : 0 ;
            $category->popular = $request->input('popular') == TRUE ? '1' : 0 ;
            $category->meta_title = $request->input('meta_title');
            $category->meta_descrip = $request->input('meta_descrip');
            $category->meta_keywords = $request->input('meta_keywords');



            $category->save();
            return redirect('/dashboard')->with('success', 'Category Successfully Added');
        // }
        // else{
        //     return back()->with('error', 'Product was not Saved Successfully');
        }


    public function delete($id)
    {
        $category_delete = Category::findOrFail($id);

        // if($category_delete->image)
        // {
        //     $path = public_path("images/uploads/category/").$category_delete->image;
            
        //     if(File::exists($path))
        //     {
        //         File::delete($path);
        //     }
        // }

        if(File::exists(public_path('images/uploads/category/sir.jpeg'))){
            File::delete(public_path('images/sir.jpeg'));
          }else{
            dd('File does not exists.');
          }

        $category_delete->delete();
        Session::flash('flash_message', 'Categories deleted successfully!');

        return redirect('categories')->with('success', 'Category Deleted Successfully');


    }

    public function edit(Request $request, $id)
    {
    //     $item = Category::findOrNew($id);
    //     $item->fill($request->all());
    //     $item->save();

        $edit_category = Category::findOrNew($id);
        return view('admin.category.edit')->with('edit_categories', $edit_category);

    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $category_update = Category::findOrFail($id);

		// $this->validate($request, array(
		// 						'name' => 'required',
		// 						'slug' => 'required',
		// 						'short_description' => 'required',
		// 						'full_content' => 'required',
		// 					)
		// 				);

        if($request->hasFile('image'))
            {
                
                $files = $request->file('image');
                $extension = $files->getClientOriginalExtension();
                $fileName = 'category_' . time() . '.' . $extension;

                $location = '/images/uploads/category/';
                $files->move(public_path() . $location, $fileName);
                $imageLocation = $location . $fileName;
                    
                $category_update->image = $imageLocation;
            }


            $category_update->name = $request->input('name');
            $category_update->slug = $request->input('slug');
            $category_update->description = $request->input('description');
            $category_update->status = $request->input('status') == TRUE ? '1' : 0 ;
            $category_update->popular = $request->input('popular') == TRUE ? '1' : 0 ;
            $category_update->meta_title = $request->input('meta_title');
            $category_update->meta_descrip = $request->input('meta_descrip');
            $category_update->meta_keywords = $request->input('meta_keywords');



            $category_update->save();
            return redirect('/categories')->with('success', 'Category Successfully Added');

    
        // if ($request->hasFile('image')){
        //     $image_path = public_path("images/uploads/category/".$category_update->image);
        //     if (File::exists($image_path)) {
        //         File::delete($image_path);
        //     }
        //     $category_image = $request->file('image');
        //     $imgName = $category_image->getClientOriginalName();
        //     $destinationPath = public_path('images/uploads/category/');
        //     $category_image->move($destinationPath, $imgName);
        //   } else {
        //     $imgName = $bannerData->banner_name;
        //   }
        
        //   $bannerData->title = $request->banner_title;
        //   $bannerData->banner_name = $imgName;
        //   $bannerData->save();




		// $input = $request->all();

		// $category_update->fill($input)->save();

		// Session::flash('flash_message', 'News updated successfully!');

		// return redirect()->back();
    }

}







