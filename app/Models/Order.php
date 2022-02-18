<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'order_date',
        'delivery_date',
        'note',
        'user_id'];


    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
