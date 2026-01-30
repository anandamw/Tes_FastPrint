<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Kategori;
use App\Models\Status;
use App\Models\Produk;
use App\Services\ApiService;
use Illuminate\Support\Str;

class SyncProductsCommand extends Command
{
    protected $signature = 'app:sync-products';
    protected $description = 'Sync products from Fastprint API';

    public function handle(ApiService $apiService)
    {
        $this->info('Fetching data from API...');
        $data = $apiService->fetchProducts();

        if (!$data || !isset($data['data'])) {
            $this->error('Failed to fetch data or invalid response format.');
            return;
        }

        $this->info('Processing ' . count($data['data']) . ' items...');

        foreach ($data['data'] as $item) {

            $category = Kategori::firstOrCreate(
                ['nama_kategori' => $item['kategori']]
            );

            $status = Status::firstOrCreate(
                ['nama_status' => $item['status']]
            );

            Produk::updateOrCreate(
                ['id_produk' => $item['id_produk']],
                [
                    'nama_produk' => $item['nama_produk'],
                    'harga' => $item['harga'],
                    'kategori_id' => $category->id_kategori,
                    'status_id' => $status->id_status,
                ]
            );
        }

        $this->info('Sync completed successfully!');
    }
}
