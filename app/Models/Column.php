<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'string',
        'integer',
        'boolean',

    ];

    public function collections()
    {
        return $this->belongsTo(Collection::class);
    }

}
