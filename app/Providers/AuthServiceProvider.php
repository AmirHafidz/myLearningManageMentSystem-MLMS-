<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('create_task',fn(User $user) => $user->role_id == 2);
        Gate::define('attempt_task',fn(User $user) => $user->role_id == 3);
        Gate::define('create_post',fn(User $user) => $user->role_id == 1);
        Gate::define('trainer_class',fn(User $user) => $user->role_id == 2);
        Gate::define('student_course',fn(User $user) => $user->role_id == 3);
        Gate::define('list_user',fn(User $user) => $user->role_id == 1);
        Gate::define('apply_leave',fn(User $user) => $user->role_id == 2 || $user->role_id == 3);
        Gate::define('response_leave',fn(User $user) => $user->role_id ==1);
        //
    }
}
