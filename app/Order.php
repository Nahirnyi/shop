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

    // додавання замовлення
    public static function add($id)
    {
        $order = new static;
        $order->user_id = $id;
        $order->setDefaultStatus();
        $order->save();

        return $order;
    }

    //редагування замовлення
    public function edit($fields)
    {
    	$this->fill($fields);
    	$this->save();
    }

    //додавання телефонів у замовлення
    public function addMobiles($arrs)
    {
    	if ($arrs == null) {
    		return;
    	}
        foreach ($arrs as $arr) {
            $this->mobiles()->attach($arr);
        }
    	
    }

    // встановлення початкового статусу замовлення
    public function setDefaultStatus()
    {
    	$this->status = "delivered";
    	$this->save();
    }

    // встановлення статусу як "переглянуто"
    public function setStatusSaw()
    {
    	$this->status = "saw";
    	$this->save();
    }

    // встановлення статусу "у дорозі"
    public function setStatusRoad()
    {
    	$this->status = "road";
    	$this->save();
    }

    // встаовлення статусу "успішно виконано"
    public function setStatusSuccess()
    {
    	$this->status = "success";
    	$this->save();
    }

    // повертає всі телефони даного замовлення
    public function getMobiles()
    {
    	if (!$this->mobiles->isEmpty()) {
            return implode(', ', $this->mobiles->pluck('name')->all());
        }

        return 'немає телефонів';
    }
}
