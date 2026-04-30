<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Transaksi'),
        ];
    }

    protected function getListeners(): array
    {
        $storeId = Auth::id();

        return [
            "echo:store.{$storeId},TransactionStatusUpdated" => 'onTransactionUpdated',
        ];
    }

    public function onTransactionUpdated($data): void
    {
        $code = $data['code'] ?? '';
        $status = $data['status'] ?? '';

        if ($status === 'pending') {
            Notification::make()
                ->title('🔔 Pesanan Baru Masuk!')
                ->body("Kode transaksi: {$code}")
                ->success()
                ->duration(10000)
                ->send();
        } else {
            Notification::make()
                ->title('Pembayaran Berhasil')
                ->body("Transaksi {$code} - Status: " . ucfirst($status))
                ->info()
                ->send();
        }
    }
}
