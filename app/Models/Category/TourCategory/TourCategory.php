<?php

namespace App\Models\Category\TourCategory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class TourCategory extends Model
{
    use HasFactory;

    protected $table = 'tour_categories';
    protected $guarded = [''];

    public function tours()
    {   
        return $this->hasMany(Tour::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


}
