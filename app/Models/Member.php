<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name',
        'free_start',
        'free_end',
        'group_id',
    ];
    /** @use HasFactory<\Database\Factories\MemberFactory> */
    use HasFactory;

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
