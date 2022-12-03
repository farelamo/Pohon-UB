<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location_id', 'tree_type_id', 'polygon_data', 'donatures'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function tree_type()
    {
        return $this->belongsTo(TreeType::class, 'tree_type_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function tree_details()
    {
        return $this->hasMany(TreeDetail::class);
    }
}
