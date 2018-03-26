<?php

namespace App;

use Auth;
use App\Order;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{

	protected $fillable = [
    'name','description','price','count','cpu','camera',
    'size','weight','display','battery', 'memory'];

   public function orders()
    {
        return $this->belongsToMany(
            Order::class,
            'order_mobiles',
            'mobile_id',
            'order_id'
        );
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    //створення нового телефону
    public static function add($fields)
    {
    	$phone = new static;
    	$phone->fill($fields);
        $phone->setCategory($fields['category_id']);
    	$phone->save();

    	return $phone;
    }


    //редагування даних телефона
    public function edit($fields)
    {
    	$this->fill($fields);
        $this->setCategory($fields['category_id']);
    	$this->save();
    }

    //змінення кількості телефонів
    public function changeCountMobiles($count)
    {
        $this->count = $count;
        $this->save();
    }

    //видалення телефону
    public function remove()
    {
    	$this->removeImage();
    	$this->delete();
    }

    //видалення картинки телефону
    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete($this->image);
        }
    }

    //збереження картинки телефона
    public function uploadImage($image)
    {
    	if ($image == null) {
    		return;
    	}
        $this->removeImage();
    	
    	$filename = 'uploads/'.str_random(20) . '.' . $image->extension();
    	$image->storeAs('/',$filename);
    	$this->image = $filename;
    	$this->save();
    }

    // повертає картинку телефону
    public function getImage()
    {
    	if ($this->image == null) {
    		return '../../../img/no-image.png';
    	}

    	return '../../../' . $this->image;
    }

    //добавляє категорію до телефону
    public function setCategory($id)
    {
    	if ($id == null) {
    		return;
    	}
    	$this->category_id = $id;
    	$this->save();
    }

    //повертає назву категорії телефону
    public function getCategoryTitle()
    {
        return $this->category->name;
    }
}
