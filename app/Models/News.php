<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected  $guarded = [];

    /** Restituisce l'utente a cui è associata la news
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function findAll() {
        return News::all();
    }

    public function firstFiveNews() {
        return News::all()->take(5);
    }
}
