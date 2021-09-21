<?php

namespace App\Models\Contact\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;


class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $guarded = [''];


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
