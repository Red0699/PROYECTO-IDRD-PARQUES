<?php

namespace App\Http\Controllers;

use App\Events\UserRecord;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\PhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('No se le permite cambiar los datos de un usuario predeterminado.')]);
        }

        $user = Auth::user();

        $data = $request->validated();

        $user->update($data);
        $updated_fields = $user->getChanges(); // Campos que han sido modificados
        
        $campos = implode(',', $updated_fields); //Se pasa el array a un string
        event(new UserRecord($user, "profile", $campos));
        return back()->withStatus(__('Se ha actualizado los datos correctamente.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('No se le permite cambiar la contraseña de un usuario predeterminado.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        //event(new UserRecord($request, "profile"));
        return back()->withPasswordStatus(__('La contraseña se ha actualizado.'));
    }

    public function photo(PhotoRequest $request)
{
    if (auth()->user()->id == 1) {
        return back()->withErrors(['not_allow_profile' => __('No se le permite cambiar la foto de un usuario predeterminado.')]);
    }

    $user = User::findOrFail(auth()->user()->id);

    if ($request->hasFile('photo')) {
        $oldFilePath = public_path($user->photo);
        if (File::exists($oldFilePath)) {
            File::delete($oldFilePath);
        }

        $file = $request->file('photo');
        $destinationPath = 'images/users/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $request->file('photo')->move(public_path($destinationPath), $filename);
        $user->photo = $destinationPath . $filename;
    }

    $user->save();
    event(new UserRecord($user, "photo", "foto"));

    return back()->withStatus(__('Datos actualizados correctamente'));
}

}
