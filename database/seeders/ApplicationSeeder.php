<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $applications = [

            [
                'name' => 'MeetUp',
                'code' => 'MU',
                'description' => 'Reservation Meeting Room App',
                'category_id' => 1,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://meetup.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 1,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Maintenance System',
                'code' => 'MS',
                'description' => 'Maintenance Plant Machine System',
                'category_id' => 1,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://kpn-maintenance.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 2,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Change Request Management',
                'code' => 'CRM',
                'description' => 'Maintain and Monitoring Change Request',
                'category_id' => 1,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://change-request.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 3,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'CSR System',
                'code' => 'CSR',
                'description' => 'Corporate Social Responsibility System',
                'category_id' => 1,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://csr-apps.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 4,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Asset Management System',
                'code' => 'AMS',
                'description' => 'Maintain Asset System',
                'category_id' => 1,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://ams.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 4,
                'icon' => null,
                'is_active' => true,
            ],
        ];

        foreach ($applications as $application) {
            Application::updateOrCreate(
                ['code' => $application['code']],
                $application
            );
        }
    }
}