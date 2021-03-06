<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';
    protected $fillable=['user_id','mobile','address','name','province','city','area'];
    protected $guarded = [];
    public $primaryKey = 'user_id';
    public $timestamps = false;
}
