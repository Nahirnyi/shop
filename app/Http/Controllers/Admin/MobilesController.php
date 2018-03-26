<?php

namespace App\Http\Controllers\Admin;

use App\Mobile;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class MobilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobiles = Mobile::all();
        return view('admin.mobiles.index', ['mobiles' => $mobiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.mobiles.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:mobiles',
            'description' => 'required',
            'image' => 'nullable|image',
            'count' => 'required|integer',
            'price' => 'required|numeric
'
        ]);
        $mobile = Mobile::add($request->all());
        $mobile->uploadImage($request->file('image'));
        return redirect()->route('mobiles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobile = Mobile::find($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('admin.mobiles.edit', ['mobile' => $mobile,'categories' => $categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mobile = Mobile::find($id);
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('mobiles')->ignore($mobile->id),
            ],
            'description' => 'required',
            'image' => 'nullable|image',
            'count' => 'required|integer',
            'price' => 'required|numeric
'
        ]);
        $mobile->edit($request->all());
        $mobile->uploadImage($request->file('image'));
        return redirect()->route('mobiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobile::find($id)->remove();
        return redirect()->route('mobiles.index');
    }

    public function count($id)
    {
        $mobile = Mobile::find($id);
        return view('admin.mobiles.count', ['mobile' => $mobile]);
    }

    public function changeCount(Request $request, $id)
    {
        $this->validate($request, [
            'count' => 'required|integer'
        ]);

        $mobile = Mobile::find($id);
        $mobile->changeCountMobiles($request->get('count'));
        return redirect()->route('mobiles.index');
    }
}
