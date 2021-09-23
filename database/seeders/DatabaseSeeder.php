<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // User::create([
            //     'name' => 'Rohan Leopold',
            //     'email' => 'rerorero@gmail.com',
            //     'password' => bcrypt('12345')
            // ]);
            
            // User::create([
                //     'name' => 'Bjorn Yokuts',
                //     'email' => 'riorio@gmail.com',
                //     'password' => bcrypt('12345')
                // ]);
                
        User::factory(10)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Post::factory(50)->create();
        // Post::create([
        //     'judul' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates nesciunt nemo nisi maxime corrupti perferendis. Animi nulla saepe cum ad repellendus libero quod sit illo hic sed, iusto non illum commodi cumque nemo pariatur enim ipsum dignissimos at suscipit perspiciatis magnam possimus veniam? Blanditiis nesciunt eligendi quia nihil, aut laudantium? Veniam, similique. Libero necessitatibus officia, quos nemo voluptatibus ipsum soluta. Voluptates, reprehenderit.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'judul' => 'Judul Ke-dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates nesciunt nemo nisi maxime corrupti perferendis. Animi nulla saepe cum ad repellendus libero quod sit illo hic sed, iusto non illum commodi cumque nemo pariatur enim ipsum dignissimos at suscipit perspiciatis magnam possimus veniam? Blanditiis nesciunt eligendi quia nihil, aut laudantium? Veniam, similique. Libero necessitatibus officia, quos nemo voluptatibus ipsum soluta. Voluptates, reprehenderit.',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        
        // Post::create([
        //     'judul' => 'Judul Ke-tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates nesciunt nemo nisi maxime corrupti perferendis. Animi nulla saepe cum ad repellendus libero quod sit illo hic sed, iusto non illum commodi cumque nemo pariatur enim ipsum dignissimos at suscipit perspiciatis magnam possimus veniam? Blanditiis nesciunt eligendi quia nihil, aut laudantium? Veniam, similique. Libero necessitatibus officia, quos nemo voluptatibus ipsum soluta. Voluptates, reprehenderit.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'judul' => 'Judul Ke-empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit eaque, minima vero eum architecto necessitatibus veniam sit enim quis suscipit quo quisquam, totam sed ipsum debitis voluptates nesciunt nemo nisi maxime corrupti perferendis. Animi nulla saepe cum ad repellendus libero quod sit illo hic sed, iusto non illum commodi cumque nemo pariatur enim ipsum dignissimos at suscipit perspiciatis magnam possimus veniam? Blanditiis nesciunt eligendi quia nihil, aut laudantium? Veniam, similique. Libero necessitatibus officia, quos nemo voluptatibus ipsum soluta. Voluptates, reprehenderit.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
