<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    //attributes name, is_admin

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'wishlist_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function validate(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "email" => "required",
                "password" => "required",
                "is_admin" => "required|numeric",
            ]
        );
    }

    public static function validateEdit(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "email" => "required",
                "is_admin" => "required|numeric",
            ]
        );
    }

    public function getAdmin()
    {
        return $this->attributes['is_admin'];
    }

    public function setAdmin($admin)
    {
        $this->attributes['is_admin'] = $admin;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getWishlist()
    {
        return $this->attributes['wishlist_id'];
    }

    public function setWishlist($wishlist)
    {
        $this->attributes['wishlist_id'] = $wishlist;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlist()
    {
        return $this->BelongsTo(WishList::class);
    }
}
