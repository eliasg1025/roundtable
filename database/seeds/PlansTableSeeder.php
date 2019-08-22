<?php

use Illuminate\Database\Seeder;
use App\Plan;
use Carbon\Carbon;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = new Plan();
        $plan->name = "Free";
        $plan->precio = 0;
        $plan->initial_coins = 50;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Standard Business";
        $plan->precio = 29;
        $plan->initial_coins = 100;
        $plan->save();

        $plan = new Plan();
        $plan->name = "Premium Business";
        $plan->precio = 59;
        $plan->initial_coins = 250;
        $plan->save();
    }
}
