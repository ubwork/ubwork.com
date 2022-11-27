<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobPostActivities extends Model
{
    use HasFactory;
    protected $table = 'job_post_activities';
    protected $fillable = [
        'job_post_id',
        'seeker_id',
        'company_id',
        'created_at',
        'updated_at',
        'time',
        'is_function'
    ];
    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function jobs()
    {
        return $this->belongsToMany(job::class);
    }
    public function seeker_profile()
    {
        return $this->belongsTo(SeekerProfile::class,'seeker_id');
    }
    public function getListCandidate($post_id){
       $jobActive = DB::table($this->table)->where('job_post_id',$post_id)->get();
       $data = $jobActive;
       $selectShow = ['candidates.name','candidates.avatar','candidates.email','candidates.phone'];
       foreach($jobActive as $key => $job){
            $seeker_id =  DB::table('seeker_profiles')->select($selectShow)->join('candidates','candidates.id','=','seeker_profiles.candidate_id')->where('seeker_profiles.id',$job->seeker_id)->first();
            $data[$key]->infoCandidate = $seeker_id;
       }
       return $data;
    }
}
