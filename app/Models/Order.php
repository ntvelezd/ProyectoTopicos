<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //attributes score, totalPrice, handbag, user_id

    protected $fillable = ['adress','totalPrice','user_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getAdress()
    {
        return $this->attributes['adress'];
    }

    public function setAdress($adress)
    {
        $this->attributes['adress'] = $adress;
    }
    public function getTotalPrice()
    {
        return $this->attributes['totalPrice'];
    }

    public function setTotalPrice($totalPrice)
    {
        $this->attributes['totalPrice'] = $totalPrice;
    }
    public function handag()
    {
        return $this->hasMany(Handbag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
