<?php

use Illuminate\Database\Seeder;

class MetricksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 100; $i++)
        {
            App\Metrick::create([
                'site'    => 'somesite.com',
                'clientX' => rand(0, 999),
                'clientY' => rand(0, 999),
                'date'    => "2020-06-23",
                'hour'    => rand(0, 23),
            ]);
        }
    }
}
