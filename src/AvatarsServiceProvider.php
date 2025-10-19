<?php

namespace Enraiged\Avatars;

use Enraiged\Avatars\Models\Avatar;
use Enraiged\Avatars\Policies\AvatarPolicy;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AvatarsServiceProvider extends ServiceProvider
{
    /** @var  array  The policy mappings for the enraiged avatars. */
    protected $policies = [
        Avatar::class => AvatarPolicy::class,
    ];

    /**
     *  Bootstrap the enraiged avatars services.
     *
     *  @return void
     */
    public function boot()
    {
        $this->bootPublish();

        $this->registerPolicies();

        Relation::morphMap([
            'avatar' => Avatar::class,
        ]);
    }

    /**
     *  Bootstrap the publish services.
     *
     *  @return void
     */
    protected function bootPublish(): void
    {
        $this->publishes(
            [__DIR__.'/../publish/app/Http/Controllers' => base_path('app/Http/Controllers')],
            ['enraiged', 'enraiged-avatars', 'enraiged-avatars-controllers'],
        );

        $this->publishes(
            [__DIR__.'/../publish/app/Http/Requests' => base_path('app/Http/Requests')],
            ['enraiged', 'enraiged-avatars', 'enraiged-avatars-requests'],
        );

        $this->publishes(
            [__DIR__.'/../publish/config/enraiged' => config_path('enraiged')],
            ['enraiged', 'enraiged-avatars', 'enraiged-avatars-config'],
        );

        $this->publishes(
            [__DIR__.'/../publish/database/migrations' => database_path('migrations')],
            ['enraiged', 'enraiged-avatars', 'enraiged-avatars-migrations'],
        );

        $this->publishes(
            [__DIR__.'/../publish/routes' => base_path('routes')],
            ['enraiged', 'enraiged-avatars', 'enraiged-avatars-routes'],
        );
    }
}
