<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Reward_Point as Authenticatable;


class Reward_Point extends Model
{
    //
	
	 protected $fillable = [
        'user_id', 'Date','Point','store_id', 'miscellanceous','Debit','Credit','storename','storenameInArebic',
    ];
}
