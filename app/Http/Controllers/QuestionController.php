<?php

namespace App\Http\Controllers;
use App\Models\Question;
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
            $questions = Question::get();
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
        $question = new Question();
        $question->texte = $request->texte;
        $question->image = $request->file('image')->store('public');
        $question->propositions = [
            "proposition_1" => ["rep_id" => 1, "name" => $request->reponse_1, "valid"=>  $request->reponse_1_valid],
            "proposition_2" => ["rep_id" => 2, "name" => $request->reponse_2, "valid"=>  $request->reponse_2_valid],
            "proposition_3" => ["rep_id" => 3, "name" => $request->reponse_3, "valid"=>  $request->reponse_3_valid],
            "proposition_4" => ["rep_id" => 4, "name" => $request->reponse_4, "valid"=>  $request->reponse_4_valid]
        ];
		if($request->id_groupe != "0") {
            $groupe= Groupe::find($request->id_groupe);
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
    public function show($id_question)
    {
		try {
            $question = Question::findOrFail($id_question);
            return response()
                ->view('admin.questions.question', [
                    'question' => $question
                ]); 
        } catch (Throwable $e) {
            return redirect('admin/question')->dangerBanner('🚨 Aucune question trouvée 🚨');
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
		$groupes = Groupe::get();
        try {
            $question = Question::findOrFail($id);
            return response()
                ->view('admin.questions.question_form', [
                    'question' => $question,'groupes' => $groupes,
                ]); 
        } catch (Throwable $e) {

            return response()
                ->view('admin.questions.question_form', [
                		'groupes' => $groupes,
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
        $question = Question::find($id);
        $question->texte = $request->texte;
        if($request->image){ // Si on veut changer l'image
            Storage::delete($question->image);
            $question->image = $request->file('image')->store('public');
/*             $question->image = $request->image; */
        }
        $question->propositions = [
            "proposition_1" => ["rep_id" => 1, "name" => $request->reponse_1, "valid"=>  $request->reponse_1_valid],
            "proposition_2" => ["rep_id" => 2, "name" => $request->reponse_2, "valid"=>  $request->reponse_2_valid],
            "proposition_3" => ["rep_id" => 3, "name" => $request->reponse_3, "valid"=>  $request->reponse_3_valid],
            "proposition_4" => ["rep_id" => 4, "name" => $request->reponse_4, "valid"=>  $request->reponse_4_valid]
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
        try{
            $question= Question::where('id', '=', $id)->delete();
            Storage::delete($question->image);
            return redirect('admin/question')->with('successMsg', 'Question supprimer')->banner('Question supprimer');
        }catch (\Exception $e) {
            return redirect('admin/question')->with('errorMsg', 'Erreur: Question non supprimer'.$e)->dangerBanner('Question non supprimer');
        }
    }
}
