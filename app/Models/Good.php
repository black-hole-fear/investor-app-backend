<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\GlobalStatus;

class Good extends Model
{
    use HasFactory;
    use GlobalStatus;

    public function getBusinessName()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }
}
