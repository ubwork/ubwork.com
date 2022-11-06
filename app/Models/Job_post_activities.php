<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_post_activities extends Model
{
    use HasFactory;
    protected $table = 'job_post_activities';
    protected $fillable = [
        'job_post_id',
        'seeker_id',
    ];
    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
