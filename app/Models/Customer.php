<?php

namespace App\Models;

use App\Observers\CustomerObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->mid_name . " " . $this->last_name;
    }

    protected static function booted()
    {
        static::observe(CustomerObserver::class);
    }
}
