<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TxtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $txts = Price::select(['*'])->get();
        return view('admin.txt.index', ['txts' => $txts->reverse()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.txt.create');
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
            'name' => 'file'
        ]);
        $txt = Price::uploadFile($request->file('name'));
        return redirect()->route('txt.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Price::find($id)->delete();
        return redirect()->route('txt.index');
    }

    public function success($id)
    {

        $txt = Price::find($id);
        $f = fopen('txt/'.$txt->name, "r");

    while(!feof($f)) { 
        $price_start = 0;
        $str = fgets($f);
        for ($i=strlen($str)-1; $i >= 1; $i--) { 
            if($str[$i] == " "){
                $price_start = $i+2;
                break;
            }
            
        }
        $price = "";
        $tmp = "";
        if ($str[strlen($str)-1] == "\n") {
            for ($i=$price_start-1; $i < strlen($str)-2; $i++) { 
                $tmp = $price;
                $price = $tmp.$str[$i];
            }
        } else {
            for ($i=$price_start-1; $i < strlen($str)-1; $i++) { 
                $tmp = $price;
                $price = $tmp.$str[$i];
            }
        }
        dump($price);
        
    }

    fclose($f);
    }
}
