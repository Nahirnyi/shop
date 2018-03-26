<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mobile;
use App\User;

class Order extends Model
{
    public const STATUS_DELIVERED = 'delivered';

    // protected $fillable = ['firstName', 'lastName', 'anotherName', 'phoneNumber', 'city', 'numberDepartment'];

   public function mobiles()
    {
    	return $this->belongsToMany(
    		Mobile::class,
    		'order_mobiles',
    		'order_id',
    		'mobile_id'
    	);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public static function add($fields)
    // {
    //     $order = new static;
    //     $order->fill($fields);
    //     $order->setDefaultStatus();
    //     $order->save();

    //     return $order;
    // }

    public static function add($id)
    {
        $order = new static;
        $order->user_id = $id;
        $order->setDefaultStatus();
        $order->save();

        return $order;
    }


    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->save();
    }

    public function addMobiles($arrs)
    {
    	if ($arrs == null) {
    		return;
    	}
        foreach ($arrs as $arr) {
            $this->mobiles()->attach($arr);
        }
    	
    }

    public function setDefaultStatus()
    {
    	$this->status = "delivered";
    	$this->save();
    }

    public function setStatusSaw()
    {
    	$this->status = "saw";
    	$this->save();
    }

    public function setStatusRoad()
    {
    	$this->status = "road";
    	$this->save();
    }

     public function setStatusSuccess()
    {
    	$this->status = "success";
    	$this->save();
    }

    public function getMobiles()
    {
    	if (!$this->mobiles->isEmpty()) {
            return implode(', ', $this->mobiles->pluck('name')->all());
        }

        return 'немає телефонів';
    }
}
