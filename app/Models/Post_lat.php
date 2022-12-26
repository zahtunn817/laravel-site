<?php

namespace App\Models;

class Post
{
    static $blog_posts =
    [
        ["tittle" => "Chapter 1",
            "slug" => "judul-chap1",
            "author" => "Hiratsuki",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente obcaecati officiis tempore quos unde ad distinctio maxime est, accusamus maiores magni laborum quod eum sunt nulla pariatur libero recusandae, reiciendis soluta debitis delectus dolores suscipit! Cumque pariatur, corrupti voluptate sed corporis magni facilis perspiciatis expedita cum reprehenderit iusto eius nisi obcaecati architecto earum optio animi eveniet recusandae rerum molestias aliquid. Itaque tenetur explicabo, illum ullam laboriosam dolore est nesciunt quaerat placeat ratione atque commodi iusto cum, ipsam impedit tempore hic."
        ],
        [
            "tittle" => "Chapter2",
            "slug" => "judul-chap2",
            "author" => "Hiratsuki",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque doloribus unde ut nam quas repellat consequuntur saepe dolorem hic esse. Tenetur, magni a ad qui voluptas voluptate! Saepe laboriosam perspiciatis earum pariatur eligendi dolorem atque reiciendis, minima ratione laborum fuga modi molestias aspernatur tempore error possimus rem ducimus aliquam nemo ut soluta ea odio? Voluptas accusantium quis eveniet quos placeat sequi reiciendis inventore expedita eius, alias quibusdam nobis ab deserunt? Veniam necessitatibus sit voluptates repellat vel reprehenderit eligendi. Vitae impedit explicabo iste placeat incidunt distinctio, recusandae, atque excepturi nihil totam sapiente at perspiciatis sit, consequatur facilis fugit aut repellat quasi."
        ]
    ];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        
        return $posts->firstWhere('slug', $slug);
    }
    
}
