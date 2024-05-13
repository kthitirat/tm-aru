<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilter(Builder $query, array $filters): void
    {
        if (isset($filters['search']) && $filters['search'] != null) {
            $searchTerm = $filters['search'];
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name_th', 'LIKE', "%$searchTerm%")
                    ->orWhere('name_en', 'LIKE', "%$searchTerm%")
                    ->orWhere('code', 'LIKE', "%$searchTerm%");
            })->orWhereHas('professors', function ($query) use ($searchTerm) {
                $query->where('first_name', 'LIKE', "%$searchTerm%")
                    ->orWhere('last_name', 'LIKE', "%$searchTerm%");
            })->orWhereHas('professors.department',function($query) use ($searchTerm){
                $query->where('name', 'LIKE', "%$searchTerm%");
            });
        }
    }

}
