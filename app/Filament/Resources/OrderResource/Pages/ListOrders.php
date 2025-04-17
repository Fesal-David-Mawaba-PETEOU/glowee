<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStats;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All Orders'),
            'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new'))
                ->label('New Orders')
                ->icon('heroicon-o-sparkles'),
            'processing' => Tab::make()->query(fn ($query) => $query->where('status', 'processing'))
                ->label('Processing Orders')
                ->icon('heroicon-o-arrow-path'),
            'shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'shipped'))
                ->label('Shipped Orders')
                ->icon('heroicon-o-truck'),
            'delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered'))
                ->label('Delivered Orders')
                ->icon('heroicon-o-check-circle'),
            'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled'))
                ->label('Cancelled Orders')
                ->icon('heroicon-o-x-circle'),
        ];
    }

}
