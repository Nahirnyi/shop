<?php

namespace App;
use App\Order;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'anotherName', 'phoneNumber', 'city', 'numberDepartment', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // додаваннянового користувача
    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->is_admin=0;
        $user->ban=0;
        $user->save();

        return $user;
    }
    
    // редагування користувача
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    // видалення користувача
    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    // видалення картинки користувача
    public function removeAvatar()
    {
         if ($this->avatar != null) {
             Storage::delete('uploads/' . $this->avatar);
        }
    }

    // завантаження картинки
    public function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }
        $this->removeAvatar();
       
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    // шифрування і збереження пароля
    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    // повертає картинку користувача
    public function getImage()
    {
        if ($this->avatar == null) {
            return '../../img/no-image.png';
        }

        return '../../../uploads/' . $this->avatar;
    }

    // робить користувача адміном
    public function makeAdmin()
    {
        $this->is_admin = 1;
        $this->save();
    }

    // робить користувача простим користувачем
    public function makeNormal()
    {
        $this->is_admin = 0;
        $this->save();
    }

    // переключатель між адміном і простим користувачем
    public function toggleAdmin()
    {
        if ($this->is_admin) {
            return $this->makeNormal();
        }

        return $this->makeAdmin();
    }

    // банить користувача
    public function ban()
    {
        $this->ban = 1;
        $this->save();
    }

    // розбанює користувача
    public function unban()
    {
        $this->ban = 0;
        $this->save();
    }

    // переключатель між баном і анбаном
    public function toggleBan()
    {
        if ($this->ban) {
            return $this->unban();
        }

        return $this->ban();
    }
}
