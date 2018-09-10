<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_subHeading' => $this->product_subHeading,
            'product_description' => $this->product_description,
            'img_path' => $this->img_path,
            'price'=> [
                // 'type' => $this->price()->product_pricetype,
                'value' => $this->productprice->product_price,
                
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
