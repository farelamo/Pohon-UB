<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'tree_lists')
                    ->withPivot('details','location_id')
                    ->withTimestamps();
    }
}
