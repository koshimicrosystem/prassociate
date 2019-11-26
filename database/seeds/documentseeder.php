<?php

use App\Card;
use App\Customer;
use App\Document;
use App\Unit;
use Illuminate\Database\Seeder;

class documentseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = Unit::all();

        foreach ($units as $item) {
            $item->documents()->createMany(
                factory(Document::class, rand(1,5))->make()->toArray()
            );
        }

        $cards = Card::all();
        foreach ($cards as $item) {
            $item->documents()->createMany(
                factory(Document::class, rand(1,2))->make()->toArray()
            );
        }

        $customers = Customer::all();
        foreach ($customers as $item) {
            $item->documents()->createMany(
                factory(Document::class, rand(1,2))->make()->toArray()
            );
        }
    }
}
