<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Url extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = ['user_id', 'big_url', 'small_url', 'count_click'];


    public function user(){
        return $this->belongsTo(User::class);
    }



}
