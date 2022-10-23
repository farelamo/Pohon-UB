<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeDetail extends Model
{
    use HasFactory;

    protected $fillable = ['tall', 'cluster_id'];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
