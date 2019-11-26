<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class accessimplseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imple=array ('Bucket Scrapper','Cultivator','Disc Harrow','Potato Planter','Seed Cum Fertilizer Drill');
        $access = array('CANOPY','SEAT COVER','STEERING GRIP','INDICATOR GUARD','CLUTCH LOCK','PEN-TYPE PRESSURE GAUGE',);
        
        foreach ($imple as $item) {
            DB::insert('insert into impls (type, varient, received_at, supplier_name, invoice_number, quantity, price, invoice_amount, gst_applicable) values (?, ?,?, ?,?, ?,?, ?,?)', ['Implement'.rand(10,1000), 'Varient',Carbon::now(),'Mahindra','35465465',500,50000,'SD5487',true]);
        }
        foreach ($access as $item) {
            DB::insert('insert into accesses (type, varient, received_at, supplier_name, invoice_number, quantity, price, invoice_amount, gst_applicable) values (?, ?,?, ?,?, ?,?, ?,?)', ['Access'.rand(10,1000), 'Varient',Carbon::now(),'Mahindra','35465465',500,50000,'SD5487',true]);
        }
    }
}
