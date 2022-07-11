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
        if ($request->file('image')){
            $question->image = $request->file('image')->store('images/questions');
            $request->image->move(public_path('images/questions'), $question->image);
        } else{
            // image par défaut
            $question->image = 'images/Questions-Banner.jpg';
        }

        Storage::delete($question->image);

        $nb_proposition = $request->nb_proposition;

        // Ajouter dynamiquement les réponses à la question
        $question->propositions = [];
        for ($i = 1; $i <= $nb_proposition; $i++) {

            $valid = $request->input("reponse_".$i."_valid");
            $name = $request->input("reponse_".$i);

            // Ajouter dynamiquement les réponses à la question
            $question->propositions = array_merge($question->propositions, [
                "proposition_".$i => ["rep_id" => $i, "name" => $name, "valid"=> $valid],
            ]);

        }

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
            $question->image = $request->file('image')->store('images/questions');
            $request->image->move(public_path('images/questions'), $question->image);
            Storage::delete($question->image);
        }

        $nb_proposition = $request->nb_proposition;

        // Ajouter dynamiquement les réponses à la question
        $question->propositions = [];
        for ($i = 1; $i <= $nb_proposition; $i++) {

            $valid = $request->input("reponse_".$i."_valid");
            $name = $request->input("reponse_".$i);

            // Ajouter dynamiquement les réponses à la question
            $question->propositions = array_merge($question->propositions, [
                "proposition_".$i => ["rep_id" => $i, "name" => $name, "valid"=> $valid],
            ]);

        }

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
