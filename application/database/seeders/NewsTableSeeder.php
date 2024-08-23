<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'category_id'=>1,
                'user_id'=>1,
                'title'=>'News Title one',
                'slug'=>'News-Title-one',
                'summary'=>'News Summary one',
                'description'=>'News Description one',
            ],
            [
                'category_id'=>2,
                'user_id'=>2,
                'title'=>'News Title two',
                'slug'=>'News-Title-two',
                'summary'=>'News Summary two',
                'description'=>'News Description two',
            ],
            [
                'category_id'=>3,
                'user_id'=>3,
                'title'=>'News Title three',
                'slug'=>'News-Title-three',
                'summary'=>'News Summary three',
                'description'=>'News Description three',
            ],
            [
                'category_id'=>4,
                'user_id'=>3,
                'title'=>'News Title four',
                'slug'=>'News-Title-four',
                'summary'=>'News Summary four',
                'description'=>'News Description four',
            ],
            [
                'category_id'=>4,
                'user_id'=>3,
                'title'=>'News Title four demo',
                'slug'=>'News-Title-four-demo',
                'summary'=>'News Summary four demo',
                'description'=>'News Description four demo',
            ],

        ];


        foreach ($newsData as $news){
            $title = $news['title'];
            $NewsExist = News::where('title','=', $title)->first();
            if(!$NewsExist){
                News::create($news);
            }
        }
    }
}
