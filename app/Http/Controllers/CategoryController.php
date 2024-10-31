<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('category.index');
            }
            else{
                return redirect()->route('poster');
            }
        }
        else{
            return redirect('/login');
        }
    }

    public function index()
    {
        $category = Category::paginate(10);

        return view('Admin.Tables.category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Tables.create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect()->route('category.index')
            ->with('action', ['Category Added Successfully!', 'primary']);
    }

    public function edit(Category $category)
    {

        return view('Admin.Tables.update_category', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $request['name'] = ($request->name) ? $request->name : $category->name;

        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('action', ['Category Updated Successfully!', 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')
            ->with('action', ['Category Deleted Successfully!', 'danger']);
    }
}
