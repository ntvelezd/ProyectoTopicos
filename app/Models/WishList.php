<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //attributes user_id

    protected $fillable = ['user_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function handbags()
    {
        return $this->hasMany(Handbag::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
