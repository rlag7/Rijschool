<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Invoice;
use App\Models\Registration;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = Registration::all();

        foreach ($registrations as $registration) {
            $amountExclVat = rand(100, 800);
            $vat = $amountExclVat * 0.21; // example VAT 21%
            $amountInclVat = $amountExclVat + $vat;

            Invoice::create([
                'registration_id' => $registration->id,
                'invoice_number' => 'INV-' . str_pad($registration->id, 5, '0', STR_PAD_LEFT),
                'invoice_date' => now()->subDays(rand(10, 100)),
                'amount_excl_vat' => $amountExclVat,
                'vat' => $vat,
                'amount_incl_vat' => $amountInclVat,
                'status' => rand(0, 1) ? 'Paid' : 'Open',
                'is_active' => true,
                'note' => 'Invoice for package',
            ]);
        }
    }
}
