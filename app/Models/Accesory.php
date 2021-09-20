<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Accesory extends Model
{
    //attributes name,price

    protected $fillable = ['name,price'];

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

    public function user()
    {
        return $this->HasMany(Item::class);
    }
}
