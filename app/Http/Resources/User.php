<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id'            => $this->resource->id,
            'email'         => $this->resource->email,
            'name'          => $this->resource->name,
            'created_at'    => $this->resource->created_at,
            'updated_at'    => $this->resource->updated_at,
        ];
        return $result;
    }
}
