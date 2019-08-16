<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getStatus()
    {
        if ($this->status == 0){
            return "Payment Awaiting";
        }
        elseif ($this->status == 1){
            return "Payment Received, Shipment Awaiting";
        }
        elseif ($this->status == 2){
            return "Completed";
        }

    }

    public function getTotal()
    {
        return round($this->quantity * 48, 3);
    }
}
