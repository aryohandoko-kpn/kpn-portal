<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    public function run(): void
    {
        $categoryErp = Category::where('name', 'ERP Digital Application')->first();

        $applications = [

            [
                'name' => 'MeetUp',
                'code' => 'MU',
                'description' => 'Reservation Meeting Room App',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://meetup.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 0,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Maintenance System',
                'code' => 'MS',
                'description' => 'Maintenance Plant Machine System',
                'category_id' => $categoryErp?->id,
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
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://change-request.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 4,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'CSR System',
                'code' => 'CSR',
                'description' => 'Corporate Social Responsibility System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://csr-apps.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 6,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Asset Management System',
                'code' => 'AMS',
                'description' => 'Maintain Asset System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://ams.gamasap.com/login',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 8,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Logsheet System',
                'code' => 'LS',
                'description' => 'Maintain Logsheet System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'logsheet-builder.gamasap.com',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 10,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Compass System',
                'code' => 'CS',
                'description' => 'Maintain Compass System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://compass.gamasap.com/',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 12,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'E-Log System',
                'code' => 'ELS',
                'description' => 'Maintain E-Log System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.27.7.193/index.php',
                'environment' => 'Production',
                'status' => 'active',
                'display_order' => 14,
                'icon' => null,
                'is_active' => true,
            ],

            // DEV

            [
                'name' => 'MeetUp',
                'code' => 'MUD',
                'description' => 'Reservation Meeting Room App',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://172.30.1.126:8090/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 1,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Maintenance System',
                'code' => 'MSD',
                'description' => 'Maintenance Plant Machine System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.30.1.126:8083/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 3,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Change Request Management',
                'code' => 'CRMD',
                'description' => 'Maintain and Monitoring Change Request',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.30.1.126:8085/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 5,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'CSR System',
                'code' => 'CSRD',
                'description' => 'Corporate Social Responsibility System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.30.1.126:8081/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 7,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Asset Management System',
                'code' => 'AMSD',
                'description' => 'Maintain Asset System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'https://172.30.1.126:8080/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 9,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Logsheet System',
                'code' => 'LSD',
                'description' => 'Maintain Logsheet System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.30.1.126:8088/login',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 11,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'Compass System',
                'code' => 'CSD',
                'description' => 'Maintain Compass System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.30.1.126:8086/',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 13,
                'icon' => null,
                'is_active' => true,
            ],

            [
                'name' => 'E-Log System',
                'code' => 'ELSD',
                'description' => 'Maintain E-Log System',
                'category_id' => $categoryErp?->id,
                'department' => 'Digital Application',
                'owner' => 'Digital Application',
                'url' => 'http://172.27.7.193/dev/index.php',
                'environment' => 'Development',
                'status' => 'active',
                'display_order' => 15,
                'icon' => null,
                'is_active' => true,
            ],
        ];

        foreach ($applications as $app) {
            Application::updateOrCreate(
                ['code' => $app['code']],
                $app
            );
        }
    }
}