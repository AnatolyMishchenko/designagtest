<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'text' => $this->text,
            'category' => new CategoriesResource($this->category),
            'revision_id' => $this->revision_id,
            'revision' => new RevisionsResource($this->revision),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
