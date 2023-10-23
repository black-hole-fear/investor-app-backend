<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\GlobalStatus;

class Business extends Model
{
    use HasFactory;
    use GlobalStatus;

    public function getGoodsByBusiness()
    {
        return $this->hasMany(Good::class);
    }
}
