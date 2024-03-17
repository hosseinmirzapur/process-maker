<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class, 'label_id');
    }
}
