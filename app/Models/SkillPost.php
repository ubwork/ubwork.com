<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillPost extends Model
{
    use HasFactory;
    protected $table = 'skill_posts';
    protected $fillable = [
        'post_id',
        'seeker_id',
    ];
}
