<?php

namespace Enraiged\Avatars\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarFileResource extends JsonResource
{
    /** @var  string|null  The "data" wrapper that should be applied.*/
    public static $wrap;

    /**
     *  Transform the resource collection into an array.
     *
     *  @param  \Illuminate\Http\Request  $request
     *  @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'size' => $this->size,
            'type' => $this->type,
            'url' => $this->attachable->url(),
        ];
    }
}
