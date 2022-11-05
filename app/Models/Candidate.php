<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'password',
        'phone',
        'address',
        'position',
        'gender',
        'city',
        'coin',
        'link_git',
        'languages',
        'description',
        'facebook',
        'zalo',
        'twitter',
        'instagram',
        'country',
        'status'
    ];
}
