<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Product as Authenticatable;


class Store extends Model
{
    
protected $fillable = [
        'storename', 'address', 'city','state','storenameinarabic', 'addressinarabic', 'cityinarabic','stateinarabic','pinno','contactno','email','latitude','longitude',
    ];




   
}
?>
