<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'ian',
            'username' => 'sofyanjc',
            'email' => 'ian@gmail.com',
            'password' => bcrypt('password')
        ]);
            
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, totam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, dolore beatae! Odio mollitia optio ea delectus veniam ab consequatur labore nulla, eos animi officia? Earum, nostrum numquam. Consequatur praesentium deserunt perspiciatis ipsum voluptatibus vitae commodi consectetur mollitia rem esse nemo quidem architecto repudiandae et, tempora fugit quisquam. Laudantium et enim labore beatae tenetur velit ipsa incidunt inventore, iure, minus veniam officia facilis qui vel repudiandae dicta odio laborum cum quo id aperiam animi? Ipsum fuga a suscipit perspiciatis quia id praesentium explicabo? Numquam sequi odio libero, ut magni iusto nesciunt sed alias delectus autem tempora repellat vel dolor placeat dignissimos ab fugiat quibusdam aperiam ullam praesentium perspiciatis deserunt, itaque, quis architecto! Commodi quam adipisci ad iste odit accusantium, velit vero',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, totam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, dolore beatae! Odio mollitia optio ea delectus veniam ab consequatur labore nulla, eos animi officia? Earum, nostrum numquam. Consequatur praesentium deserunt perspiciatis ipsum voluptatibus vitae commodi consectetur mollitia rem esse nemo quidem architecto repudiandae et, tempora fugit quisquam. Laudantium et enim labore beatae tenetur velit ipsa incidunt inventore, iure, minus veniam officia facilis qui vel repudiandae dicta odio laborum cum quo id aperiam animi? Ipsum fuga a suscipit perspiciatis quia id praesentium explicabo? Numquam sequi odio libero, ut magni iusto nesciunt sed alias delectus autem tempora repellat vel dolor placeat dignissimos ab fugiat quibusdam aperiam ullam praesentium perspiciatis deserunt, itaque, quis architecto! Commodi quam adipisci ad iste odit accusantium, velit vero',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, totam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, dolore beatae! Odio mollitia optio ea delectus veniam ab consequatur labore nulla, eos animi officia? Earum, nostrum numquam. Consequatur praesentium deserunt perspiciatis ipsum voluptatibus vitae commodi consectetur mollitia rem esse nemo quidem architecto repudiandae et, tempora fugit quisquam. Laudantium et enim labore beatae tenetur velit ipsa incidunt inventore, iure, minus veniam officia facilis qui vel repudiandae dicta odio laborum cum quo id aperiam animi? Ipsum fuga a suscipit perspiciatis quia id praesentium explicabo? Numquam sequi odio libero, ut magni iusto nesciunt sed alias delectus autem tempora repellat vel dolor placeat dignissimos ab fugiat quibusdam aperiam ullam praesentium perspiciatis deserunt, itaque, quis architecto! Commodi quam adipisci ad iste odit accusantium, velit vero',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, totam.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, dolore beatae! Odio mollitia optio ea delectus veniam ab consequatur labore nulla, eos animi officia? Earum, nostrum numquam. Consequatur praesentium deserunt perspiciatis ipsum voluptatibus vitae commodi consectetur mollitia rem esse nemo quidem architecto repudiandae et, tempora fugit quisquam. Laudantium et enim labore beatae tenetur velit ipsa incidunt inventore, iure, minus veniam officia facilis qui vel repudiandae dicta odio laborum cum quo id aperiam animi? Ipsum fuga a suscipit perspiciatis quia id praesentium explicabo? Numquam sequi odio libero, ut magni iusto nesciunt sed alias delectus autem tempora repellat vel dolor placeat dignissimos ab fugiat quibusdam aperiam ullam praesentium perspiciatis deserunt, itaque, quis architecto! Commodi quam adipisci ad iste odit accusantium, velit vero',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
