<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Process extends Model
{
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function lists(): HasMany
    {
        return $this->hasMany(ListObject::class, 'process_id');
    }
}
