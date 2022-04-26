<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Groupe;
use App\Models\User;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $groupes = Groupe::all();
            return response()
                ->view('admin.groupe.group_list', [
                    'groupes' => $groupes,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('admin.groupe.group_list', [
                    'groupes' => [],
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
        return response()->view('admin.groupe.group_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $groupe = new Groupe();
        $groupe->groupname = $request->groupname;
        $groupe->moy = $request->moy;

        $groupe->save();
        $groupes = Groupe::get();
            return response()->view('admin.groupe.group_list', [
                    'groupes' => $groupes,
                ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $groupe = Groupe::find($id);
            $users = User::get()->where('id_groupe', '=', $groupe->id);
    
            return view('admin.groupe.groupe', ['groupe' => $groupe, 'users' => $users]);

        } catch (Throwable $e) {
            return response()
                ->view('admin.groupe.group_list');
        }
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
            $groupe = Groupe::findOrFail($id);
            return response()
                ->view('admin.groupe.group_form', [
                    'groupe' => $groupe,
                ]); 
        } catch (Throwable $e) {
            return response()
                ->view('admin.groupe.group_form');
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
        $groupe = Groupe::find($id);
        $groupe->groupname = $request->groupname;
        $groupe->moy = $request->moy ;
        
        $groupe->save();
        //Retour liste des questions
        $groupes = Groupe::get();
        return response()->view('admin.groupe.group_list', [
                'groupes' => $groupes,
            ]);
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
            Groupe::where('id', '=', $id)->delete();
            return redirect('admin/groupe')->with('successMsg', 'Groupe supprimer');
        } catch (\Exception $e) {
            return redirect('admin/groupe')->with('errorMsg', 'Erreur: Groupe non supprimer'.$e);
        }
    }
}
