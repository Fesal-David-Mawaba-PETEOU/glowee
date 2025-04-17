<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Order;

class OrderStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::query()->where('status', 'new')->count())
                ->color('success')
                ->icon('heroicon-o-sparkles'),
            
            Stat::make('Processing Orders', Order::query()->where('status', 'processing')->count())
                ->color('warning')
                ->icon('heroicon-o-arrow-path'),

            Stat::make('Shipped Orders', Order::query()->where('status', 'shipped')->count())
                ->color('warning')
                ->icon('heroicon-o-truck'),

            Stat::make('Completed Orders', Order::query()->where('status', 'delivered')->count())
                ->color('primary')
                ->icon('heroicon-o-check-circle'),

            Stat::make('Cancelled Orders', Order::query()->where('status', 'cancelled')->count())
                ->color('danger')
                ->icon('heroicon-o-x-circle'),

            Stat::make('Average Price', 'XOF ' . number_format(Order::query()->avg('grand_total'), 2))
                ->color('primary'),
        ];
    }
}
