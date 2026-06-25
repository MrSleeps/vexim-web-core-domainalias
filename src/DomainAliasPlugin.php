<?php

namespace VEximweb\Core\DomainAlias;

use Filament\Contracts\Plugin;
use Filament\Panel;
use VEximweb\Core\DomainAlias\Filament\Resources\DomainAliasResource;

class DomainAliasPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());
        return $plugin;
    }       
    
    public function getId(): string
    {
        return 'domainaliases';
    }

    public function register(Panel $panel): void
    {
        // Register the Group resource
        $panel->resources([
            DomainAliasResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        // Any boot logic
    }
}
