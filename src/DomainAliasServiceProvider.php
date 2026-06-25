<?php
namespace VEximweb\Core\DomainAlias;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;
use VEximweb\Core\Data\Repositories\DomainAliasRepository;
use VEximweb\Core\Data\Repositories\Interfaces\DomainAliasRepositoryInterface;

class DomainAliasServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/domainalias.php',
            'domainalias'
        );
        
        // Bind plugin repositories
        $this->bindRepositories();        
        
        Panel::configureUsing(function (Panel $panel) {
            $panel->plugin(DomainAliasPlugin::make());
        });          
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->loadViewsFrom(__DIR__ . '/../resources/views', 'domainalias');
        //$this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->publishes([
            __DIR__ . '/../config/domainsaliase.php' => config_path('domainsaliase.php'),
        ], 'domainalias-config');
        if ($this->app->runningInConsole()) {
            $this->commands([

            ]);
        }
    }
    
    /**
     * Bind all repositories to their interfaces.
     */
    protected function bindRepositories(): void
    {
        // FIXED: Bind DomainAliasRepositoryInterface to DomainAliasRepository
        $this->app->bind(
            DomainAliasRepositoryInterface::class, 
            DomainAliasRepository::class
        );
    }       
}