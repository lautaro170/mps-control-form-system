<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\FormTypeEnum;

class FormTemplate extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'type',
        'json_definition',
        ];

    protected $casts = [
        'type' => FormTypeEnum::class,
    ];
}
