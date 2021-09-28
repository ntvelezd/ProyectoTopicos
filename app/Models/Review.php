<?php

namespace App\Models;

use illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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

    public function getHandbagId()
    {
        return $this->attributes['handbag_id'];
    }

    public function setHandbagId($handbagId)
    {
        $this->attributes['handbag_id'] = $handbagId;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($userId)
    {
        $this->attributes['user_id'] = $userId;
    }

    public function handbag()
    {
        return $this->belongsTo(Handbag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
                "score" => "required|numeric|between:0,5",
                "comentary" => "required",
            ]
        );
    }
}
