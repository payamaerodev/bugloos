<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'name';

    protected $fillable = [
        'name',
        'value',
    ];

    protected $casts = [
        'value' => 'json',
    ];}
