<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScoreModel;
use App\Models\User;
class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $scores = ScoreModel::get();
            return response()
                ->view('admin.scores.scores_list', [
                    'scores' => $scores,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('admin.scores.scores_list', [
                    'scores' => [],
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
		$users = User::all();
        return response()->view('admin.scores.scores_form',[
			'users' => $users,
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
		$scores = new ScoreModel();
        $scores->moy = $request->moy;
        $scores->user_id = $request->user_id;
        $scores->save();
        return redirect('admin/score');
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
            $score = ScoreModel::findOrFail($id);
			$users = User::all();
            return response()
                ->view('admin.scores.scores_form', [
                    'score' => $score,
                    'users' => $users,
                ]);
        } catch (Throwable $e) {
            return redirect('admin/score/create')->banner('Aucun score trouver pour cet id, Formulaire de création');
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
		$score = ScoreModel::find($id);
        $score->moy = $request->moy;
        $score->user_id = $request->user_id;
        $score->save();
        return redirect('admin/score');
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
            ScoreModel::where('id', '=', $id)->delete();
            return redirect('admin/score')->banner('Score supprimer');
        } catch (\Exception $e) {
            return redirect('admin/score')->dangerBanner('Erreur: score non supprimer');
        }
    }
}
