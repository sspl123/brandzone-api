<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Product as Authenticatable;


class Product extends model
{

	public function categories()
    {
        //return $this->hasMany('App\Category','categoryid');
       return $this->hasMany(Category::class ,'categoryid');
}

   

    //protected $primaryKey = 'user_id';

protected $fillable = [
        'productname', 'manufacturer','productnameinarabic','manufacturerinarabic', 'price','unit','categoryid','image','baseprice',
    ];
     
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 /*edited code*/



   

