<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tree_types()
    {
        return $this->belongsToMany(TreeType::class, 'clusters')
                    ->withPivot('donatures', 'polygon_data', 'avg_tall', 'tree_count', 'tree_type_id')
                    ->withTimestamps();
    }
}
