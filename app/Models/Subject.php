<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [      //ส่วนนี้saveลงฐานข้อมูล
        'name_th',         // Text field for Thai name
        'name_en',         // Text field for English name
        'code',            // String for code
        'description',     // Text field for description
        'unit',            // Nullable string for unit
        'published_at',    // Nullable dateTime for publish date
        'view',
    ];

    protected $casts = [                    //ป้องกันการใส่สคริปเข้ามา
        'published_at' => 'datetime',
        'view' => 'integer',
    ];

    public function professors()
    {
        return $this->belongsToMany(Professor::class);
    }
}
