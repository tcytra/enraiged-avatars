<?php

namespace Enraiged\Avatars\Policies;

use Enraiged\Avatars\Models\Avatar;
use Enraiged\Users\Models\User;

class AvatarPolicy
{
    /**
     *  @param  \Enraiged\Users\Models\User  $auth
     *  @param  \Enraiged\Avatars\Models\Avatar  $avatar
     *  @return bool
     */
    public function delete(User $auth, Avatar $avatar)
    {
        return $auth->can('update', $avatar->avatarable);
    }

    /**
     *  @param  \Enraiged\Users\Models\User  $auth
     *  @param  \Enraiged\Avatars\Models\Avatar  $avatar
     *  @return bool
     */
    public function edit(User $auth, Avatar $avatar)
    {
        return $auth->can('edit', $avatar->avatarable);
    }

    /**
     *  @param  \Enraiged\Users\Models\User  $auth
     *  @param  \Enraiged\Avatars\Models\Avatar  $avatar
     *  @return bool
     */
    public function show(User $auth, Avatar $avatar)
    {
        return $avatar->exists;
    }

    /**
     *  @param  \Enraiged\Users\Models\User  $auth
     *  @param  \Enraiged\Avatars\Models\Avatar  $avatar
     *  @return bool
     */
    public function update(User $auth, Avatar $avatar)
    {
        return $auth->can('update', $avatar->avatarable);
    }

    /**
     *  @param  \Enraiged\Users\Models\User  $auth
     *  @param  \Enraiged\Avatars\Models\Avatar  $avatar
     *  @return bool
     */
    public function upload(User $auth, Avatar $avatar)
    {
        return $auth->can('update', $avatar->avatarable);
    }
}
