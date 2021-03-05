<?php

namespace App\Providers;
use App\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Post'=>'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //  Gate::define('isAllowed',function($user,$post)
        //  {
        //     // $allowed=explode(":",$allowed);
        
        //     // $roles=$user->roles->pluck('name')->toArray();
        //     // return  array_intersect($post->all(),$roles);
        //     return $user->id===$post;
        //  });

         
        // Gate::define('isAllowed','App\Gates\PostGate@allowed');
        // Gate::define('edit-post','App\Gates\PostGate@editAction');
        // Gate::define('delete-post','App\Gates\PostGate@deleteAction');
    }
}
