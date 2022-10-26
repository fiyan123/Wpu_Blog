<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
   private static $blog_posts = [

       [
           "title" => "Judul Post Pertama",
           "slug" => "judul-post-pertama",
           "author" => "ian",
           "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis molestiae rem iste laudantium tempora, possimus, labore, numquam fuga soluta sit sed fugit. Nam labore alias ea autem consequatur minima commodi voluptatibus aspernatur nobis, asperiores facere dicta exercitationem ipsam dolor nulla itaque doloremque. Neque provident praesentium maiores vel itaque ad necessitatibus quae assumenda dolorem nam voluptatibus, voluptas corrupti laboriosam, est ipsam placeat pariatur sed libero omnis id eaque sapiente in! Dignissimos facilis ratione hic reprehenderit amet, modi corporis itaque quaerat beatae recusandae quam illo culpa ad explicabo totam, in laborum sint!"
       ],
   
       [
           "title" => "Judul Post Kedua",
           "slug" => "judul-post-kedua",
           "author" => "ian2",
           "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis molestiae rem iste laudantium tempora, possimus, labore, numquam fuga soluta sit sed fugit. Nam labore alias ea autem consequatur minima commodi voluptatibus aspernatur nobis, asperiores facere dicta exercitationem ipsam dolor nulla itaque doloremque. Neque provident praesentium maiores vel itaque ad necessitatibus quae assumenda dolorem nam voluptatibus, voluptas corrupti laboriosam, est ipsam placeat pariatur sed libero omnis id eaque sapiente in! Dignissimos facilis ratione hic reprehenderit amet, modi corporis itaque quaerat beatae recusandae quam illo culpa ad explicabo totam, in laborum sint!"
       ],
   ];

   public static function all()
   {
        return collect(self::$blog_posts);
   }

   public static function find($slug)
   {
        // Mengambil semua data
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
   }

}
