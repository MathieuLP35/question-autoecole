<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Question;
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
            $questionnaire = $groupe->questions()->get()->random(1);
    
            return response()
                ->view('pages.test.test', [
                    'questions' => $questionnaire,
                ]);
        } catch (Throwable $e) {
            return response()
                ->view('pages.test.test', [
                    'questions' => [],
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
        $result = 0;
    
        foreach ($question->propositions as $cle => $reponse){
            if($request->input($cle) != $reponse['valid']){
                $result++;
            }
        }

        $groupe= Groupe::find(Auth::user()->groupe_id);
        $questionnaire = $groupe->questions()->get()->random(1);

        if ($result == count($question->propositions)){
            
            return response()
            ->view('pages.test.test', [
                'questions' => $questionnaire,
            ]);
        }else{

            return response()
            ->view('pages.test.test', [
                'questions' => $questionnaire,
            ]);
        }
    }
}
