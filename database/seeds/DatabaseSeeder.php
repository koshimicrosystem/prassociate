<?php

use App\Address;
use App\Card;
use App\Contact;
use App\Customer;
use App\Document;
use App\Unit;
use App\Unitmodel;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    var $units;
    public function run()
    {
        
        factory(Unitmodel::class, 50)->create()
            ->each(function ($unitmodel) {
                $unitmodel->units()->createMany(
                    factory(Unit::class, rand(0,20))->make()->toArray()
            );
        });

        factory(Customer::class, 50)->create()
            ->each(function ($customer) {
                $customer->cards()->createMany(
                    factory(Card::class, rand(1,4))->make()->toArray()
                );
                $customer->addresses()->createMany(
                    factory(Address::class, rand(1,3))->make()->toArray()
                );
                $customer->Contacts()->createMany(
                    factory(Contact::class, rand(1,5))->make()->toArray()
                );
        });

        factory(User::class, 10)->create();

        $this->call(role_permission_seeder::class);
        $this->call(documentseeder::class);
        $this->call(accessimplseeder::class);
        
    }
}
