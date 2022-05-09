<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Rules\Password;
use Throwable;

class UtilisateurController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = User::all();

            return response()
                ->view('admin.Utilisateurs.utilisateurs_list', [
                    'users' => $users,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('admin.Utilisateurs.utilisateurs_list', [
                    'users' => [],
                ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Groupe::all();
        return response()->view('admin.utilisateurs.utilisateurs_form', [
            'groupes' => $groupes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => ['required', 'string', 'max:10'],
            'groupe_id' => ['required', 'string', 'max:255'],
        ]);

        $messages = $validator->errors()->all();

        if ($validator->fails()) {
            return redirect('admin/utilisateur/create')->dangerBanner($messages);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'groupe_id' => $request->id_groupe,
            ]);
            return redirect('admin/utilisateur')->banner('Compte crée avec succès.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $groupes = Groupe::all();
            return response()
                ->view('admin.Utilisateurs.utilisateurs_form', [
                    'user' => $user,
                    'groupes' => $groupes,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('admin.Utilisateurs.utilisateurs_form', [
                    'user' => [],
                    'groupes' => [],
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $name = strval($request->name);
            if ($name != ""){
                $datas = User::find($id);
                $datas->name =  htmlentities(htmlspecialchars(ucfirst($request->name)));
                $datas->email = $request->email;
                $datas->role =  $request->role;
                $datas->save();
            }else{
                return redirect('admin/utilisateur/'.$id.'/edit')->dangerBanner('Erreur: impossible de modifié le nom de l\'utilisateur');
            }
            return redirect('admin/utilisateur')->banner('Compte modifié avec succès.');
        }catch(Throwable $e){
            return redirect('admin/utilisateur')->dangerBanner('Erreur: impossible de modifié le nom de l\'utilisateur');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::where('id', '=', $id)->delete();
            return redirect('admin/utilisateur')->with('successMsg', 'Utilisateur supprimer');
        } catch (\Exception $e) {
            return redirect('admin/utilisateur')->with('errorMsg', 'Erreur: utilisateur non supprimer'.$e);
        }
    }

    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return ['required', 'string', new Password, 'confirmed'];
    }
}
