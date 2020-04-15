<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;

class Group extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
