<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'type',
    ];

    public function columns(): HasMany
    {
        return $this->hasMany(Column::class);
    }
}
