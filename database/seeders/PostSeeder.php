<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $user2 = User::find(2);

        $post1 = new Post();
        $post1->title = 'First Post';
        $post1->body = 'This is my first blog post.';
        $post1->user_id = $user1->id;
        $post1->save();

        $post2 = new Post();
        $post2->title = 'Second Post';
        $post2->body = 'This is my second blog post.';
        $post2->user_id = $user2->id;
        $post2->save();
    }
}
