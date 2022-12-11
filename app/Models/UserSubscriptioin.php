<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscriptioin extends Model
{
    use HasFactory;

    protected $table = "user_subscriptions";
    protected $fillable = [
        'email',
        'email_unique_id',
    ];
}
