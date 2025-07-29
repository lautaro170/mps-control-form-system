<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\FormTypeEnum;

class FormTemplate extends Model
{
    protected $fillable = [
        'description',
        'type',
        'json_definition',
        ];

    protected $casts = [
        'type' => FormTypeEnum::class,
    ];
}
