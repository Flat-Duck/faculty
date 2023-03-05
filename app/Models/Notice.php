<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

        /**
     * Get the providers for the Service.
     */
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
