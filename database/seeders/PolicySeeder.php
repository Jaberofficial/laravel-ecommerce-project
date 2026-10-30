<?php

namespace Database\Seeders;

use App\Models\WebsitePolicy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policies = [
            [
                'privacy_policy' => "Test Policy",
                'terms_conditions' => "Test Terms &Conditions",
                'refund_policy' => "Test Refund Policy",
                'payment_policy' => "Test Payment Policy",
                'about_us' => "Test AboutUS",
            
            ] 
        ];

        WebsitePolicy::insert($policies);
    }
}
