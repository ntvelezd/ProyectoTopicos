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

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($orderId)
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getHandbagId()
    {
        return $this->attributes['handbag_id'];
    }

    public function setHandbagId($handbagId)
    {
        $this->attributes['handbag_id'] = $handbagId;
    }

    public function getAccesoryId()
    {
        return $this->attributes['accesory_id'];
    }

    public function setAccesoryId($accesoryId)
    {
        $this->attributes['accesory_id'] = $accesoryId;
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
