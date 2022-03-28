<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Eloquent;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Category
 *
 * @mixin Eloquent
 */

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('add-category-form');
    }

    public function displayCategories()
    {
        $categories = new Category();
        return view('categories', ['categories' => $categories->getAllCategories()]);
    }

    public function insertCategory(Request $request)
    {
        $category = new Category();

        $request->validate([
            "image"        => "required|image|mimes:jpg,png,jpeg,gif,svg|max:2048",
            "name"         => "required|min:2|max:20",
            "is_active"    => "required",
        ]);

        $image = $request->file('image');
        $input['image'] = str_replace(" ", "-", $image->getClientOriginalName());
        $destinationPath = public_path('storage/uploads');
        $image->move($destinationPath, $input['image']);

        $category->image = $input['image'];
        $category->name = $request->name;
        $category->is_active = $request->is_active;
        $category->save();

        Alert::success('Updated!', 'category added successfully!');
        return redirect('categories');
    }
}
