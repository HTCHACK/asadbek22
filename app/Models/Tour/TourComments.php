<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;
use App\Models\Tour\Tour;

class TourComments extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
