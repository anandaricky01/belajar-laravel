<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 
    // protected $fillable = ['judul','excerpt','body'];
    protected $guarded = ['id']; 

    // dengan menggunakan ini, kita tidak perlu terlalu sering memanggil with
    protected $with = ['category','author'];
    /*
        ini adalah kebalikan dari fillable, alias (yang ada di properti $guarded tidak boleh diisi
        dan yang lainnya boleh)

        mau pakai yang mana aja boleh~
    */

    /*
        cara menghubungkan/JOIN dengan models lain dengan menggunakan
        belongsTo / hasMany
    */

    public function scopeFilter($query, array $filters){

        /*
            $collection = collect([1, 2, 3]);

            $collection->when(true, function ($collection) {
                return $collection->push(4);
            });

            - ketika parameter pertama bernilai true, maka closure akan dijalankan dengan parameter
            yang sudah diset pada closure 

            - kurang lebih jadi kayak if

            - kebalikan dari when adalah unless()
        */

        // $search pada closure akan menangkap apapun yang ada pada $filters['search]
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('judul', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
        });

        // versi biasa alias closure
        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use($category){
                return $query->where('slug', $category);
            });
        });

        // versi arrow function alias fn
        $query->when($filters['author'] ?? false, fn($query, $author)=>
            $query->whereHas('author', fn($query)=>
            $query->where('username', $author)
            )
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

/*
ini adalah metode mengisi tabel dengan cara massAssignment

syaratnya adalah :
    - membuat properti protected $fillable = ['colomn1','colomn2']; supaya dapat diisi saat menggunakan terminal
    - jika masih tidak bisa, keluarkan dulu dari php artisan tinker dengan menggunakan ctrl + c, kemudian baru masuk kembali

App\Models\Post::create([
    "judul"=>"Pemrograman Python",
    "category_id" => 1,
    "slug"=>"pemrograman-python",
    "excerpt"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam non quisquam dolore tenetur. Incidunt tempore atque neque deleniti",
    "body"=>"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam non quisquam dolore tenetur. Incidunt tempore atque neque deleniti perspiciatis ipsam minus distinctio, aliquid omnis eligendi voluptate at quis, unde iure pariatur ratione dolorem harum nisi facere architecto fuga aliquam quia possimus dolore.</p><p>magni iste debitis est quae obcaecati, voluptatibus sapiente minima incidunt, quos repellat aut natus molestias culpa hic eos consequuntur tenetur quidem nostrum odio pariatur deserunt accusantium cumque! Iste, maxime ex minus dignissimos obcaecati non, nihil quis repudiandae, dolorum dicta impedit facere. Optio maiores eligendi porro cumque eos laborum illo excepturi illum. Delectus magnam magni, eligendi, nemo voluptatem in aliquid unde atque id vel assumenda soluta quia cum. Veritatis dignissimos eum magnam iusto, voluptatem in quidem aliquam?</p>"
],
[
    "judul"=>"Apa itu Vue.js?",
    "category_id" => 2,
    "slug"=>"apa-itu-vue-js",
    "excerpt"=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam non quisquam dolore tenetur. Incidunt tempore atque neque deleniti",
    "body"=>"<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente veniam non quisquam dolore tenetur. Incidunt tempore atque neque deleniti perspiciatis ipsam minus distinctio, aliquid omnis eligendi voluptate at quis, unde iure pariatur ratione dolorem harum nisi facere architecto fuga aliquam quia possimus dolore.</p><p>magni iste debitis est quae obcaecati, voluptatibus sapiente minima incidunt, quos repellat aut natus molestias culpa hic eos consequuntur tenetur quidem nostrum odio pariatur deserunt accusantium cumque! Iste, maxime ex minus dignissimos obcaecati non, nihil quis repudiandae, dolorum dicta impedit facere. Optio maiores eligendi porro cumque eos laborum illo excepturi illum. Delectus magnam magni, eligendi, nemo voluptatem in aliquid unde atque id vel assumenda soluta quia cum. Veritatis dignissimos eum magnam iusto, voluptatem in quidem aliquam?</p>"
])


*/