<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackCandidate extends Model
{
    use HasFactory;
    protected $table = 'feedback_candidates';
    protected $fillable = [
        'id',
        'candidate_id',
        'company_id',
        'rate',
        'comment',
        'satisfied',
        'unsatisfied',
        'is_candidate',
        'created_at',
        'updated_at',
    ];
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
