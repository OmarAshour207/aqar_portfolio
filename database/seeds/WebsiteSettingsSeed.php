<?php

use Illuminate\Database\Seeder;

class WebsiteSettingsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filters = ['about', 'our_projects', 'contacts','our_services', 'stat', 'team_members', 'testimonials', 'latest_blog'];
        \App\Models\WebsiteSetting::create([
            'page_filter'   => serialize($filters)
        ]);
    }
}
