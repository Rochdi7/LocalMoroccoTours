<?php
namespace Database\Seeders;

use App\Models\PostComment;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    public function run()
    {
        PostComment::create([
            'post_id' => 1,
            'guest_name' => 'John Doe',
            'guest_email' => 'john@example.com',
            'comment_title' => 'Amazing post!',
            'comment_body' => 'Loved the recommendations!',
            'is_approved' => true
        ]);
    }
}
