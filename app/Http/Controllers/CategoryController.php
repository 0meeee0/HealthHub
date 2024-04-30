<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        // dd($request);
        $data = new Category();
        $data->catName = $request->catName;
        $data->save();

        return redirect()->back()->with('message','Category added succesfully');
    }
    
    public function deleteCat($category)
    {
        $categories = Category::find($category);
        $categories->delete();
        return redirect()->back()->with('message2','Category deleted succesfully');
    }
      public function update(Request $request, $id)
    {
        $request->validate([
            'catName' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'catName' => $request->catName,
        ]);

        return redirect()->back()->with('message', 'Category updated successfully');
    }

    
}
