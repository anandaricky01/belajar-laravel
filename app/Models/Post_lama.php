<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
            "title" =>"Judul post pertama",
            "slug" => "judul-post-pertama",
            "author" => "Ananda Ricky Fauzi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, ipsum? Nihil enim reprehenderit quaerat aliquam distinctio vero ipsa, quae doloribus labore consectetur esse quam numquam debitis nemo eveniet alias quas?"
        ],
        [
            "title" =>"Judul post kedua",
            "slug" => "judul-post-kedua",
            "author" => "Leonard Firmwell",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem unde impedit corrupti optio rerum sit expedita eos cum, quos cupiditate aliquam soluta a. Doloremque architecto cupiditate numquam dignissimos minus nihil, est, aspernatur temporibus minima placeat consequuntur assumenda. Amet, laboriosam. Ea laborum, necessitatibus itaque commodi voluptatibus saepe quas consectetur assumenda, temporibus ad nobis in ipsa rerum voluptatum deserunt! Commodi aspernatur est amet excepturi similique necessitatibus quidem iste vel obcaecati asperiores ad molestiae ex soluta deleniti, animi aut autem maiores fuga. Voluptates corporis ut saepe quo voluptate dolor quisquam rem modi qui."
        ]
    ];

    public static function all(){
        /*
            dengan menggunakan collect(array wrapper) kita bisa membuat array kita
            menjadi sebuah collection; di mana, collection ini membuat array kita
            menjadi lebih "sakti"

            contohnya kita bisa membuat collect menunjukan array pertama kita
            dengan menggunakan : 
            - collect($namaArray)->first()
            - collect($namaArray)-firstWhere('assosiatif_array_element',$variabel)
        */
        return collect(self::$blog_post);
    }

    public static function find($slug){
        $posts = static::all();

        return $posts->firstWhere('slug',$slug);
    }
}
