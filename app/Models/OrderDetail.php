<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";

    protected $fillable = [
        'menu_id',
        'quantity',
        'order_id',
        'created_at',
        'updated_at'];


    public function orders()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }
    
    public function menus() 
    {
        return $this->hasOne('App\Models\Menu', 'id', 'menu_id');
    
    }
}
