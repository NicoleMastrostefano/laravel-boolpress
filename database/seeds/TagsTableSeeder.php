<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $tags = [
        'PHP',
        'Laravel',
        'Javascript',
        'HTML',
        'CSS'
      ];
      
      foreach ($tags as $tag){
        // creo istanza
        $newTag= new Tag();
        // valorizzo
        $newTag->name=$tag;
        $newTag->slug = Str::slug($tag);
        // salvo
        $newTag->save();
      }

    }
}
