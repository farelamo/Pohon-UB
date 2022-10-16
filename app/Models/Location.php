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
        return $this->belongsToMany(TreeType::class, 'tree_lists')
                    ->withPivot('details','tree_type_id')
                    ->withTimestamps();
    }
}
