<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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
