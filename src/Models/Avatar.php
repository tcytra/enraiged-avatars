<?php

namespace Enraiged\Avatars\Models;

use Enraiged\Files\Contracts\AttachableContract;
use Enraiged\Files\Traits\Attachable;
use Enraiged\Database\Track\Created;
use Enraiged\Database\Track\Updated;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model implements AttachableContract
{
    use Attributes\AvatarColor,
        Attachable, Created, Updated;

    /** @var  string  The avatars storage directory. */
    protected $directory = 'avatars';

    /** @var  array  The attributes that aren't mass assignable. */
    protected $guarded = ['id'];

    /** @var  string  The morphable name. */
    protected $morphable = 'avatarable';

    /** @var  array  The image resizable parameters. */
    protected $resize = [
        'width' => 250,
        'height' => 250,
        'strict' => true,
    ];

    /** @var  string  The database table name. */
    protected $table = 'avatars';

    /**
     *  Get the parent avatarable model.
     *
     *  @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function avatarable()
    {
        return $this->morphTo();
    }
}
