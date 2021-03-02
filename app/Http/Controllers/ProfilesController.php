<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user) {

        //restituisce l'utente con l'id passato oppure mostra l'errore 404
        $user = User::findOrFail($user);

        return view('profiles.index', ['user' => $user]);
    }

    public function edit(User $user) {
        $this->authorize('update', $user);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user);

        $data = request()->validate([
            'nome' => 'required',
            'username' => 'required',
            'email' => 'email',
            'bio' => '',
            'foto' => 'image',
        ]);

        if(request('foto')) {
            $imagePath = request('foto')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['foto' => $imagePath];
        }

        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect(("/profile/{$user->id}"));
    }
}
