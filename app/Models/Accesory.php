<?php

namespace App\Models;

use Illuminate\Http\Request;
use illuminate\Database\Eloquent\Model;

class Accesory extends Model
{

    //attributes name,price,image

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

    public function items()
    {
        return $this->HasMany(Item::class);
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "price" => "required|numeric|gt:0",
                "profile_image" => "required"
            ]
        );
    }

    public static function totalValue($accesories)
    {
        $total = 0;
        foreach ($accesories["accesories"] as $accesory) {
            $total = $total + ($accesory->getPrice() * $accesories["quantifyAccesory"][$accesory->getId()]);
        }
        return $total;
    }
}
