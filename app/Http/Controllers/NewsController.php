<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    /**
     * NewsController constructor.
     * richiede l'autenticazione prima di visualizzare la pagina
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('news.create');
    }

    public function store() {
        $data = request()->validate([
            'titolo' => 'required',
            'descrizione' => '',
            'articolo' => '',
            'foto' => 'image',
        ]);

        $imagePath = request('foto')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        //crea una notizia associata all'utente loggato
        auth()->user()->news()->create([
            'titolo' => $data['titolo'],
            'descrizione' => $data['descrizione'],
            'articolo' => $data['articolo'],
            'foto' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\News $news) {
        return view('news.show', compact('news'));
    }
}
