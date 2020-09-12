<?php

use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\About::create([
            'ar_title'  => 'عننا',
            'en_title'  => 'About Us',
            'ar_description'    => 'About Us Desc in ar',
            'en_description'    => 'About Us Desc in en',
        ]);
    }
}
