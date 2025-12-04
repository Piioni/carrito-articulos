<?php

namespace App\Models;

use Database\Factories\SugerenciaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sugerencia extends Model
{
    /** @use HasFactory<SugerenciaFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'texto',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
