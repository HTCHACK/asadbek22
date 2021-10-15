<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use App\Models\Tour\Tour;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class,'tour_id');
    }
}
