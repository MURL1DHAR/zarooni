<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaction;
use App\Models\Profile;

class Route extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_id',
        'route_name',
        'route_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class, 'route_id', 'id');
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }

}
