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
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
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
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);
        //event(new UserRecord($request, "profile"));
        return back()->withPasswordStatus(__('La contraseña se ha actualizado.'));
    }

    public function photo(PhotoRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }
        //$datos = request()->except('_token','_method');

        $user = User::findOrFail(auth()->user()->id);
        //$user = $datos; 

        if($request->hasFile('photo')){
            $ruta = public_path().'/assets/img/featureds/users/'.$user->foto;
            unlink($ruta);
            $file = $request->file('photo');
            //$userData = User::findOrFail(auth()->user()->id);
            $destinationPath = 'assets/img/featureds/users/';
            $filename = $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $filename);
            $user->photo = $destinationPath . $filename;
        }
        $user->save();
        event(new UserRecord($user, "photo", "foto"));
       //User::where('id','=',auth()->user()->id)->update($user);
        return back()->withStatus(__('Datos actualizados correctamente'));
    }
}
