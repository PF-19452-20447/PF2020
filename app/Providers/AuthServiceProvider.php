<?php

namespace App\Providers;

use App\Policies\InquilinoPolicy;
use App\Policies\ProprietarioPolicy;
use App\Proprietario;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Providers\Inquilino;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
         Inquilino::class => InquilinoPolicy::class,
         User::class => UserPolicy::class,
         Proprietario::class => ProprietarioPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



    }
}
