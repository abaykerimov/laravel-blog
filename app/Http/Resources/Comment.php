<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Comment extends Resource
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
            'body'          => $this->resource->body,
            'created_at'    => $this->resource->created_at,
            'updated_at'    => $this->resource->updated_at,
            'user_id'       => $this->resource->user_id,
        ];
        return $result;
    }
}
