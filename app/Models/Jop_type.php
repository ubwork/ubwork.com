<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jop_type extends Model
{
    use HasFactory;
    protected $table = 'job_type';
    protected $fillable = [
        'id',
        'name',
        'description',
        'jop_post_id',
        'created_at',
        'updated_at',
    ];
}
