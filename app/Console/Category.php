<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Product as Authenticatable;


class Category extends model
{

	
   
public function product()
    {
        return $this->belongsTo('App\Product', 'categoryid');
        //return $this->belongsTo('products');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categorytype', 'categoryinarabic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
 /*edited code*/
public function isAdmin()
{
    foreach ($this->role()->get() as $role)
    {
        if ($role->name == '1')
        {
            return true;
        }
    }
}

   
}
