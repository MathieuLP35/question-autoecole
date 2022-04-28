<?php

namespace App\Http\Controllers;
use App\Models\QuestionModel;
use Illuminate\Http\Request;
use App\Models\Groupe;
use Illuminate\Support\Facades\Storage;
use Throwable;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $questions = QuestionModel::get();
            return response()
                ->view('admin.questions.question_list', [
                    'questions' => $questions,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('admin.questions.question_list', [
                    'questions' => [],
                ]);
        }
    }

    /**
     * Show the form for creating a new rjesource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() /* admin/create */
    {
		$groupes = Groupe::get();
        return response()->view('admin.questions.question_form', [
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
        $question = new QuestionModel();
        $question->texte = $request->texte;
        $question->image = $request->image;
        $question->propositions = [
            "proposition_1" => ["rep_id" => 1, "name" => $request->reponse_1, "valid"=>  $request->reponse_1_valid],
            "proposition_2" => ["rep_id" => 2, "name" => $request->reponse_2, "valid"=>  $request->reponse_2_valid],
            "proposition_3" => ["rep_id" => 3, "name" => $request->reponse_3, "valid"=>  $request->reponse_3_valid],
            "proposition_4" => ["rep_id" => 4, "name" => $request->reponse_4, "valid"=>  $request->reponse_4_valid]
        ];
		if($request->id_goupe != "0") {
            $groupe= Groupe::find($request->id_goupe);
			$question->save();
			$question->groupes()->save($groupe);
		} else {
			$question->save();
        }
        return redirect('admin/question')->banner('Question crée avec succès.');
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
            $question = QuestionModel::findOrFail($id);
            return response()
                ->view('admin.questions.question_form', [
                    'question' => $question,
                ]); 
        } catch (Throwable $e) {
            return response()
                ->view('admin.questions.question_form');
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
        $question = QuestionModel::find($id);
        $question->texte = $request->texte;
        $question->image = $question->image ;
        if($request->image){ // Si on veut changer l'image
            $question->image = $request->image;
        }
        $question->propositions = [
            "proposition_1" => ["rep_id" => 1, "name" => $request->reponse_1],
            "proposition_2" => ["rep_id" => 2, "name" => $request->reponse_2],
            "proposition_3" => ["rep_id" => 3, "name" => $request->reponse_3],
            "proposition_4" => ["rep_id" => 4, "name" => $request->reponse_4]
        ];
        $question->save();
        //Retour liste des questions
        return redirect('admin/question')->banner('Question Modifiée avec succès.');
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
            QuestionModel::where('id', '=', $id)->delete();
            return redirect('admin/question')->with('successMsg', 'Question supprimer')->banner('Question supprimer');
        } catch (\Exception $e) {
            return redirect('admin/question')->with('errorMsg', 'Erreur: Question non supprimer'.$e)->dangerBanner('Question non supprimer');
        }
    }
}
