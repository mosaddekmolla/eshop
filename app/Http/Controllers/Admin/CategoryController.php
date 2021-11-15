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

                $location = 'assets/images/uploads/category/';
                $files->move($location, $fileName);
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
            return redirect('/categories')->with('status', 'Category Successfully Added',  "success");
        }


    public function delete($id)
    {
        $category_delete = Category::findOrFail($id);


        if($category_delete->image)
        {
            // dd($category_delete);
            $path = $category_delete->image;
            // dd($path);

            if(File::exists($path))
            {
                File::delete($path);

            }
            // else
            // {
            //     dd('File does not exists.');
            // }

        }



        $category_delete->delete();
        Session::flash('flash_message', 'Categories deleted successfully!');

        return redirect('categories')->with('status', 'Category Deleted Successfully', "warning");


    }

    public function edit(Request $request, $id)
    {

        $edit_category = Category::findOrNew($id);
        return view('admin.category.edit')->with('edit_categories', $edit_category);

    }

    public function update(Request $request, $id)
    {
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
            $category_update->status = $request->input('status') == TRUE ? '1' : 0 ;
            $category_update->popular = $request->input('popular') == TRUE ? '1' : 0 ;
            $category_update->meta_title = $request->input('meta_title');
            $category_update->meta_descrip = $request->input('meta_descrip');
            $category_update->meta_keywords = $request->input('meta_keywords');


        $category_update->save();
		// Session::flash('flash_message', 'Category updated successfully!');

		return redirect('categories')->with("status", "Category Deleted Successfully", "warning");


            // return redirect('/categories')->with('success', 'Category Successfully Added');

    }

}







