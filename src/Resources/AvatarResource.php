<?php

namespace Enraiged\Avatars\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarResource extends JsonResource
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
            'chars' => $this->avatarable->avatarableCharacters(),
            'color' => $this->avatar_color->hex,
            'file' => $this->file->exists
                ? new AvatarFileResource($this->file)
                : null,
        ];
    }
}
