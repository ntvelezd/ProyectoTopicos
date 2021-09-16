<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //attributes quantity, order_id,handbag_id,accesory_id

    protected $fillable = ['quantity', 'order_id', 'handbag_id', 'accesory_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function handbag()
    {
        return $this->belongsTo(Handbag::class);
    }

    public function accesory()
    {
        return $this->belongsTo(Accesory::class);
    }
    
}
