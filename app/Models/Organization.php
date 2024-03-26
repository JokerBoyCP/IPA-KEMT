<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rate'];

    public function supportRequests()
    {
        return $this->hasMany(SupportRequest::class);
    }
}
