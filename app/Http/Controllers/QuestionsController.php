<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Questions::all();

        return response()->json($questions, 200);
    }

    public function store(Request $request)
    {
        $data = [
            'quest' => $request->quest,
            'correctOption' => $request->correctOption,
            'optionA' => $request->optionA,
            'optionB' => $request->optionB,
            'optionC' => $request->optionC,
            'optionD' => $request->optionD,
            'optionE' => $request->optionE,
        ];

        $questions = Questions::create($data);
        return response()->json(['success'=> 'true'], 201);
    }

    public function show($id)
    {

        $questions = Questions::find($id);

        if (!$questions) {
            return response()->json(['erro' => 'questão inexistente'], 400);
        }

        return response()->json(['success', $questions], 200);
    }


    public function validaQuest($id, $resposta) //recebe o ID e a resposta do usuario
    {
        $question = Questions::find($id);
        $user = Auth::user();


        if (!$question) {
            return response()->json(['erro' => 'questão não encontrada'], 400);
        }

        $testaResposta = Answer::updateOrCreate([
            'question_id' =>$question->id,
            'user_id' => $user->id,
            'resposta' => $resposta,
        ],
        [
            'hit' => $question->correctOption == $resposta,
        ]);

        // echo '<pre>';
        // print_r($questions->correctOption); return 0;
        $acertos = Answer::where('user_id', $user->id)->where('hit',1)->count();
        $erros = Answer::where('user_id', $user->id)->where('hit',0)->count();

        return response()->json(['acertos' => $acertos, 'erros' => $erros], 200);
    }

    public function contAcerto(){

    }

    public function contErros(){

    }


    public function destroy($id)
    {

        $questions = Questions::find($id);

        if(!$questions){
            return response()->json(['erro' => true, 'pergunta não encontrado']);
        }

        $questions->delete();

        return response()->json(['success' => 'questão apagada'], 200);
    }

    public function listaDezQuestoes()
    {
        $questions = Questions::all()->random(10);

        return response()->json($questions, 200);
    }



}
