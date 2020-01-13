<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'Description'=>$this->details,
            'price'=>$this->price,
            'discount'=>$this->discount,
            'stock'=>$this->stock,
            'total price'=>$this->price -($this->price*$this->discount)/100,
            'rating'=>$this->reviews()->count('star')> 0 ? round($this->reviews()->sum('star')/$this->reviews()->count(),2):'No Rating Yet',
            'href'=>[
                'reviews'=>route('reviews.index',$this->id),
            ]

        ];
    }
}
