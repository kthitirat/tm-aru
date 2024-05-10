<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function professors()  //ที่โมเดลคณะไปเรียกโมเดลอาจารย์
    {
        return $this->hasMany(Professor::class, 'department_id');
    }
}
