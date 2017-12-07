<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Product as Authenticatable;



class Ahlancustomer extends Model
{


public function ahlanstatements()
    {
        //return $this->hasMany('App\Category','categoryid');
       return $this->hasMany(Ahlanstatement::class ,'mobileno');
}


 protected $primaryKey = 'mobileno'; // or null

    public $incrementing = false;
protected $fillable = [
        'mobileno', 'name','royaltyid',];




   
}
?>

