<?php

namespace App\Models;
use App\Models\Candidate;
use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SeekerProfile extends Model
{
    use HasFactory;
    protected $table = 'seeker_profiles';
    protected $fillable = [
        'id',
        'candidate_id',
        'name',
        'position_candidate',
        'coin',
        'major_id',
        'skill_id',
        'path_cv',
        'created_at',
        'updated_at',
        'description',
        'email',
        'phone',
        'image',
        'address',
    ];
    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    // lưu tạo
    public function saveAdd($params) {
        $data = $params['cols'];
        $res = DB::table($this->table)->insert($data);
        return $res;
    }

    // lưu cập nhật
    public function saveUpdate($params) {
        if(empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản cập nhật');
            return null;
        }
        $data = [];
        foreach($params['cols'] as $colName => $val) {
            if($colName == 'id') continue;
            if(in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
        ->where('id', '=', $params['cols']['id'])
        ->update($data);
        return $res;
    }
}