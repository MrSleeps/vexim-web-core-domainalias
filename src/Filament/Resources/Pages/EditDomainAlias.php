<?php

namespace VEximweb\Core\DomainAlias\Filament\Resources\Pages;

use VEximweb\Core\DomainAlias\Filament\Resources\DomainAliasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDomainAlias extends EditRecord
{
    protected static string $resource = DomainAliasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
