<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //attributes score, comentary, handbag_id, user_id

    protected $fillable = ['score','comentary','handbag_id','user_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function setScore($score)
    {
        $this->attributes['score'] = $score;
    }
    public function getComentary()
    {
        return $this->attributes['comentary'];
    }

    public function setComentary($comentary)
    {
        $this->attributes['comentary'] = $comentary;
    }
    public function handbag()
    {
        return $this->belongsTo(Handbag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
