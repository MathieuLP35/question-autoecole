<?php

namespace App\Http\Controllers;

use App\Models\QuestionModel;
use Illuminate\Http\Request;
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
        return response()->view('admin.questions.question_form');
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
            "proposition_1" => ["rep_id" => 1, "name" => $request->reponse_1],
            "proposition_2" => ["rep_id" => 2, "name" => $request->reponse_2],
            "proposition_3" => ["rep_id" => 3, "name" => $request->reponse_3],
            "proposition_4" => ["rep_id" => 4, "name" => $request->reponse_4]
        ];
        $question->save();
        $questions = QuestionModel::get();
            return response()->view('admin.questions.question_list', [
                    'questions' => $questions,
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
        $questions = QuestionModel::get();
        return response()->view('admin.questions.question_list', [
                'questions' => $questions,
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
            QuestionModel::where('id', '=', $id)->delete();
            return redirect('admin/question')->with('successMsg', 'Question supprimer');
        } catch (\Exception $e) {
            return redirect('admin/question')->with('errorMsg', 'Erreur: Question non supprimer'.$e);
        }
    }
}
