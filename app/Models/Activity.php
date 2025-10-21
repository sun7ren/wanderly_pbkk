<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'group_id',
    ];
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
