<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Author extends Model
{
    use HasFactory;
    protected $table = "author";
    protected $fillable = [
        'id', 'name', 'avatar', 'slogan'
    ];
    public function saveAdd($params)
    {
        $data = array_merge(
            $params['cols']
        );
        $res = DB::table($this->table)->insert($data);
        return $res;
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
    public function seeker()
    {
        return $this->belongsTo(SeekerProfile::class);
    }

    // lưu cập nhật
    public function saveUpdate($params)
    {

        if (empty($params['cols']['id'])) {
            Session::flash('error', 'Không xác định bản cập nhật');
            return null;
        }
        $data = [];
        foreach ($params['cols'] as $colName => $val) {
            if ($colName == 'id') continue;
            if (in_array($colName, $this->fillable)) {
                $data[$colName] = (strlen($val) == 0) ? null : $val;
            }
        }
        $res = DB::table($this->table)
            ->where('id', '=', $params['cols']['id'])
            ->update($data);
        return $res;
    }
}
