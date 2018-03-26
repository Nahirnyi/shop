<?php

namespace App\Http\Controllers\Admin;
use App\Mobile;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:categories'
    	]);
    	Category::create($request->all());

    	return redirect()->route('categories.index');
    }

    public function edit($id)
    {
    	$category = Category::find($id);
    	return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('categories')->ignore($id),
            ]
        ]);


    	$category->update($request->all());

    	return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $mobiles = Mobile::where('category_id', $id)->first();
        if ($mobiles) {
            return redirect()->route('categories.index')->with('status', 'Спочатку потрібно видалити всі телефони даної категорії!');
        }
        
    	Category::find($id)->delete();
    	return redirect()->route('categories.index')->with('status', 'Категорію успішно видалено!');;
    }
}
