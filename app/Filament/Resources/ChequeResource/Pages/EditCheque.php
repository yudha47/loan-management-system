<?php

namespace App\Filament\Resources\ChequeResource\Pages;

use App\Filament\Resources\ChequeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheque extends EditRecord
{
    protected static string $resource = ChequeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
