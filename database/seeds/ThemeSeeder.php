<?php

use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $en_names = ['first', 'second', 'third', 'fourth', 'fifth', 'sixth', 'seventh', 'eighth'];
        $ar_names = ['الأول', 'الثاني', 'الثالث', 'الرابع', 'الخامس', 'السادس', 'السابع', 'الثامن'];
        for ($i = 0; $i < count($ar_names); $i++) {
            \App\Models\Theme::create([
                'ar_title'      => $ar_names[$i],
                'en_title'      => $en_names[$i],
                'status'        => $i == 0 ? 1 : 0
            ]);
        }
    }
}
