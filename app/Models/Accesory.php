<?php

namespace App\Models;

use Illuminate\Http\Request;
use illuminate\Database\Eloquent\Model;

class Accesory extends Model
{
    public static function validate(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "price" => "required",
            ]
        );
    }

    public static function validateEdit(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "price" => "required",
                
            ]
        );
    }

    //attributes name,price


    protected $fillable = ['name','price','image'];

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

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function user()
    {
        return $this->HasMany(Item::class);
    }
}