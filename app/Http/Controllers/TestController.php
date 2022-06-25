<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Question;
use App\Models\QuestionnaireModel;
use App\Models\ScoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        try {
            $groupe = Groupe::find(Auth::user()->groupe_id);
            $question = $groupe->questions()->get()->random(1)->first();
            $questionnaire = QuestionnaireModel::where('user_id', "=", Auth::user()->id)->first();

            // Si l'utilisateur n'a pas de questionnaire on le crée
            if (empty($questionnaire)){
                // On créer une nouvelle instance de QuestionnaireModel
                $questionnaire = new QuestionnaireModel();
                $questionnaire->questions = [
                    "questions" => []
                ];
                $questionnaire->user_id = Auth::user()->id;
                $questionnaire->groupe_id = Auth::user()->groupe_id;
                $questionnaire->save();    
            } 

            // nombre de question max par test
            $nbr_question = 40;
            if(count($questionnaire->questions['questions']) == $nbr_question){
                $this->finishTest($questionnaire, $nbr_question);
            } 
            
            $askedQuestions = $questionnaire->questions;
            $askedQuestions = collect($askedQuestions['questions']);
            
            if(count($askedQuestions) > 0){
                // On regarde si la question est déjà posée
                foreach ($askedQuestions as $askedQuestion) {
                    while($askedQuestion['question_id'] == $question->id) {
                        // Si le nombre de question dans un questionnaire est égal au nombre de question maximum du groupe
                        // on donne un résultat basé sur le nombre total de question du groupe et non sur 40.
                        if (count($askedQuestions) == count($groupe->questions()->get())) {
                            $nbr_question = count($askedQuestions);
                            $this->finishTest($questionnaire, $nbr_question);
                        }
                        // Sinon on continue de demander des questions
                        return redirect()->route('test');
                    } 
                }
            }

        return response()
            ->view('pages.test.test', [
                'question' => $question,
                'questionnaire' => $questionnaire,
            ]);

        } catch (Throwable $e) {
            return response()
                ->view('pages.test.test', [
                    'questions' => [],
                    'questionnaire' => [],
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function results(Request $request, $question_id){
        $question = Question::find($question_id);
        $is_user_question_exist = QuestionnaireModel::where('user_id', "=", Auth::user()->id)->first();
        $result = 0;
        
        foreach ($question->propositions as $cle => $reponse){
            if($request->input($cle) == $reponse['valid']){
                $result++;
            }
        }
        
        if ($result == count($question->propositions)) {

            $check_question = $is_user_question_exist->questions;
            
            array_push($check_question["questions"],
                [
                    "question_id" => $question->id,
                    "name" => $question->texte,
                    "reponse" => "ok",
                ]
            );
            
            $is_user_question_exist->questions = $check_question;
            $is_user_question_exist->result++;

            $is_user_question_exist->save();
            
            return redirect()->route('test');

        } else{
            $check_question = $is_user_question_exist->questions;
            
            array_push($check_question["questions"],
                [
                    "question_id" => $question->id,
                    "name" => $question->texte,
                    "reponse" => "pas ok",
                ]
            );
            
            $is_user_question_exist->questions = $check_question;
            
            $is_user_question_exist->save();
            
            return redirect()->route('test');

        }
    }

    public function finishTest($questionnaire, $nbr_question){
                
        // Taux de réussite à un questionnaire
        $taux = $questionnaire->result / $nbr_question * 100;

        QuestionnaireModel::where('id', '=', $questionnaire->id)->delete();

        $check_score_exist = ScoreModel::where('user_id', "=", Auth::user()->id)->first();

        if(empty($check_score_exist)){
            $score = new ScoreModel();
            $score->user_id = Auth::user()->id;
            $score->moy = $taux;
            $score->save();
        } else {
            $score = ScoreModel::where('user_id', "=", Auth::user()->id)->first();
            $score->moy = round(($taux + $score->moy) / 2, 2); 
            $score->save();
        }

        $groupe_score = Groupe::find(Auth::user()->groupe_id);
        $groupe_score->moy = round(($taux + $groupe_score->moy) / 2, 2);
        $groupe_score->save();

        if ($questionnaire->result >= $nbr_question / 2){
            return redirect()->route('test')->banner('Vous avez réussi le test ' . $questionnaire->result . ' / ' . $nbr_question.'!');
        } else {
            return redirect()->route('test')->dangerBanner('Vous avez raté le test ' . $questionnaire->result . ' / ' . $nbr_question.'!');
        }
    }

}
