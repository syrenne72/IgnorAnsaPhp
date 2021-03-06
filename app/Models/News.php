<?php

namespace App\Models;

use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model {
    use HasFactory;

    protected  $guarded = [];

    /** Restituisce l'utente a cui è associata la news
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function data() {
        $date = Carbon::parse($this->data);
        return $date->format('d/m/Y');
    }

    public static function newView(int $id) {
        DB::table('news')->where('id', $id)
            ->update(['visualizzazioni' => DB::raw('visualizzazioni + 1')]);
        return 1;
    }

    public function findAll() {
        return News::all();
    }

    public function findAllDesc() {
        return News::all()->sortByDesc('id');
    }

    public function findByCategory(String $cat) {
       $std = News::query()->where('categoria', $cat)->orderBy('id', 'desc')->get()->all();
        return $std;
    }

    public function findMostPopular() {
        return News::all()->sortByDesc('visualizzazioni');
    }

    public function findByCategoryPopular(String $cat) {
        $std = News::query()->where('categoria', $cat)->orderBy('visualizzazioni', 'desc')->get()->all();
        return $std;
    }
}
