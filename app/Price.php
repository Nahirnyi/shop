<?php

namespace App;
use Carbon\Carbon;

use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    public static function uploadFile($txt)
    {
    	if ($txt == null) {
    		return;
    	}
    	if ($txt->extension() != 'txt') {
    		return 'Файл не розширення txt';
    	}

        $date = Carbon::now()->toDateTimeString();
        $r = Carbon::createFromFormat('Y-m-d h:i:s', $date)->format('Y_m_d_H_i_s');
        $price = new static;
    	$filename = $r . '.txt';
    	$txt->storeAs('txt', $filename);
    	$price->name = $filename;
    	$price->status = 'stated';
    	$price->save();
    }

}
