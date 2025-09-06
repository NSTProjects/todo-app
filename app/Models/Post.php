<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function run(): void
    {
        Post::factory()->count(20)->create();
    }
}
