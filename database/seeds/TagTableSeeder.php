<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Serie A', 'Champions League', 'Premier League', 'Grande Slam', 'Torneo ATP', 'NBA', 'Eurolega', 'Formula Uno', 'MotoGP', 'Tour de France', "Giro d'Italia", 'Vuelta a Espana'];

        foreach($tags as $tag) {

            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($tag);
            $new_tag->save();

        }
    }
}
