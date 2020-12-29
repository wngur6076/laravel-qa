<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

<<<<<<< HEAD
        Gate::define('update-question', function($user, $question) {
            return $user->id === $question->user_id;
        });

        Gate::define('delete-question', function($user, $question) {
            return $user->id === $question->user_id;
        });
=======
        // Gate::define('update-question', function ($user, $question) {
        //     return $user->id == $question->user_id;
        // });
        // Gate::define('delete-question', function($user, $question) {
        //     return $user->id === $question->user_id;
        // });
>>>>>>> 11d3f2f4168e6891c8e2b5ffde4bd0cc9e65d68f
    }
}
