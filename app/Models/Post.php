<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description'];

    // public function run(): void
    // {
    //     Post::factory()->count(20)->create();
    // }
}
