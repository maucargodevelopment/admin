<?php

namespace Database\Seeders;

use App\Models\TipeContainer;
use Illuminate\Database\Seeder;

class TipeContainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'no_container' => 'EMCU801001',
                'volume' => '45 Feet',
                'vessel' => 'Evergreen'
            ],
            [
                'no_container' => 'EISU804001',
                'volume' => '45 Feet',
                'vessel' => 'Evergreen'
            ],
            [
                'no_container' => 'WHSU2279328',
                'volume' => '40 Feet',
                'vessel' => 'Wanhai'
            ],
            [
                'no_container' => 'WHLU0650835',
                'volume' => '40 Feet',
                'vessel' => 'Wanhai'
            ],
            [
                'no_container' => 'BMOU5457753',
                'volume' => '40 Feet',
                'vessel' => 'Evergreen'
            ],
            [
                'no_container' => 'MEDU2916417 ',
                'volume' => '20 Feet',
                'vessel' => 'MSC'
            ],
            [
                'no_container' => 'MSKU4760985',
                'volume' => '45 Feet',
                'vessel' => 'Sealand'
            ],
            [
                'no_container' => 'FCIU6479842',
                'volume' => '20 Feet',
                'vessel' => 'MSC'
            ]
        ];
        
        TipeContainer::insert($data);
    }
}
