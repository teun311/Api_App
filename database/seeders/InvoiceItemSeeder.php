<?php

namespace Database\Seeders;

use App\Models\InvoiceItem;
use Database\Factories\InvoiceItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InvoiceItem::factory(10)->create();
    }
}
