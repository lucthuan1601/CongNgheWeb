<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $table = 'issues';

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }
}
