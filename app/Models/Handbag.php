<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Handbag extends Model
{

    //attributes id, name, price, style, color, score, texture,image.

    protected $fillable = ['name', 'price', 'style', 'color', 'score', 'texture', 'image'];

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

    public function getStyle()
    {
        return $this->attributes['style'];
    }

    public function setStyle($style)
    {
        $this->attributes['style'] = $style;
    }

    public function getColor()
    {

        return $this->attributes['color'];
    }
    public function setColor($color)
    {

        $this->attributes['color'] = $color;
    }

    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function setScore($score)
    {
        $this->attributes['score'] = $score;
    }

    public function getTexture()
    {
        return $this->attributes['texture'];
    }

    public function setTexture($texture)
    {
        $this->attributes['texture'] = $texture;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function wishList()
    {
        return $this->BelongsToMany(WishList::class);
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "price" => "required|numeric|gt:0",
                "style" => "required",
                "color" => "required",
                "score" => "required|numeric|between:0,5",
                "texture" => "required",
                "profile_image" => "required"
            ]
        );
    }

    public static function totalValue($handbags)
    {
        $total = 0;
        foreach ($handbags["handbags"] as $handbag) {
            $total = $total + ($handbag->getPrice() * $handbags["quantifyHandbag"][$handbag->getId()]);
        }
        return $total;
    }
}
