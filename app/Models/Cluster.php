<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = ['location_id', 'tree_type_id', 'polygon_data', 'donatures',];

    public function tree_details()
    {
        return $this->hasMany(TreeDetail::class);
    }
}
