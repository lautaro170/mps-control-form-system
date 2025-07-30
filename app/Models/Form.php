<?php

namespace App\Models;

use App\Enums\FormStatusEnum;
use App\Enums\FormTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $description
 * @property string $json_values
 * @property FormStatusEnum $status
 * @property int $form_template_id
 * @property int $client_id
 * @property int $user_id
 * @property int $created_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $completed_at
 */
class Form extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'description',
        'status',
        'json_values',
        'last_seen_page',
        'created_by',
        'form_template_id',
        'client_id',
        'user_id',
    ];

    protected $casts = [
        'status' => FormStatusEnum::class,
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function formTemplate(): BelongsTo
    {
        return $this->belongsTo(FormTemplate::class, 'form_template_id');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getTypeAttribute(): FormTypeEnum
    {
        return $this->formTemplate->type;
    }
}
