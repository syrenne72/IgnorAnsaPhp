<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;
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

    public function show(\App\Models\News $news) {
        return view('news.show', compact('news'));
    }

    public function create() {
        return view('news.create');
    }

    public function edit(News $news) {
        $this->authorize('update', $news);

        return view('news.edit', compact('news'));
    }

    public function store() {
        $data = request()->validate([
            'titolo' => 'required',
            'descrizione' => '',
            'categoria' => '',
            'articolo' => '',
            'foto' => 'image',
        ]);

        if(request('foto')) {
            $imagePath = request('foto')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['foto' => $imagePath];
        }

        //crea una notizia associata all'utente loggato
        auth()->user()->news()->create(array_merge([
            'titolo' => $data['titolo'],
            'descrizione' => $data['descrizione'],
            'categoria' => $data['categoria'],
            'articolo' => $data['articolo'],
            'visualizzazioni' => 0,
            'data' => Carbon::now()->toDateTimeString()],
            $imageArray ?? []));

        return redirect('/profile/' . auth()->user()->id);
    }

    public function update(\App\Models\News $news) {
        $this->authorize('update', $news);

        $data = request()->validate([
            'titolo' => 'required',
            'descrizione' => '',
            'categoria' => '',
            'articolo' => '',
            'foto' => '',
        ]);

        if(request('foto')) {
            $imagePath = request('foto')->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['foto' => $imagePath];
        }

        $news->update(array_merge([
                'titolo' => $data['titolo'],
                'descrizione' => $data['descrizione'],
                'categoria' => $data['categoria'],
                'articolo' => $data['articolo'],
                'visualizzazioni' => 0,
                'data' => Carbon::now()->toDateTimeString()],
            $imageArray ?? []
        ));

        return redirect('/n/' . $news->id);
    }

    public function destroy(\App\Models\News $news) {
        $this->authorize('delete', $news);

        $news->delete();

        return redirect('/profile/' . auth()->user()->id)->with('notifica', 'News eliminata');
    }
}
