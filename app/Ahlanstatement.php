<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ahlanstatement extends Model
{




        
 public function ahlancustomers()
    {
        //return $this->hasMany('App\Category','categoryid');
       return $this->hasMany(Ahlancustomer::class ,'mobileno');
}


    
protected $fillable = [
        'royaltyid', 'invoiceno', 'dateofinvoice','totalamount','points', 'redeemedcomment','storeid','mobileno',
    ];
   
}
?>
