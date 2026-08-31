<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'status',
        'date',
        'price',
        'total_tickets',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
