<?php

use Illuminate\Database\Seeder;

class HarborsTbaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Harbor::class, 20)->create();
    }
}
