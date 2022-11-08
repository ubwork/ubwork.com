<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobPost extends Model
{
    use HasFactory;
    protected $table = "job_posts";
    protected $fillable = [ 'id', 'company_id', 'title', 'major_id', 'description',  'level',   'min_salary', 'max_salary',  'requirement', 
        'start_date', 'end_date', 'area', 'address',
        'experience', 'status',  'created_at',    'updated_at',    'deleted_at',    'amount', 'type_work', 'gender',  'benefits' ];
    public $timestamps = true;  
    public function getStatusAttribute($value)
    {
        $customerStatus = null;
        switch ($value) {
            case config('custom.job_post_status.active'):
                $customerStatus = 'Active';
                break;
            case config('custom.job_post_status.block'):
                $customerStatus = 'Block';
                break;
            default:
                $customerStatus = 'Active';
                break;
        }

        return $customerStatus;
    }
    public function jobPostActives(){
        return $this->belongsToMany(JobPostActives::class);
    }
}
