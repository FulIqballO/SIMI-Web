<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;
use App\Models\TrainingRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
$registration = TrainingRegistration::first();
        
    Payment::create([
            'training_registration_id' => $registration->id,
            'invoice_code' => '5520172962',
            'transfer_date' => now()->toDateString(),
            'transfer_time' => now()->format('H:i:s'),
            'proof_of_transfer' => '6.png',
            'payment_status' => ''
        ]);

    }
}
