<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); //to allow for mass assignment
        // $this->call(UsersTableSeeder::class);
        $this->call('ArticlesTableSeeder');
    }
}

class ArticlesTableSeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();
        DB::table('articles')->delete();
        $articles = [];
        for($i=0; $i<100; $i++){
            $article_dt = $faker->dateTime('now');
            array_push($articles, [
                'title'=>$faker->sentence,
                'body'=>$faker->realText,
                'published'=>$faker->unixTime(),
                'author'=>$faker->numberBetween(0, 20),
                'created_at'=>$article_dt,
                'updated_at'=>$article_dt
                ]);
        }
        DB::table('articles')->insert($articles);
        // DB::table('articles')->insert([
        //     'title'=>'First blog post',
        //     'body'=>'Something interesting to say',
        //     'published'=>'1429860898',
        //     'author'=>1]
        //     );
    }
}
