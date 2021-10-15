<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category\TourCategory\TourCategory;
use App\Models\Tour\TourComments;
use DateTimeInterface;
use App\Models\RBAC\User;

class Tour extends Model
{
    use HasFactory;

    protected $table = "tours";
    protected $guarded = [];

    public function tourCategory()
    {
        return $this->belongsTo(TourCategory::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(TourComments::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
