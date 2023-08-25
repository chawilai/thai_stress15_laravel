<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\UserAnswers;
use App\Models\Answers;
use App\Models\UserAnswersInfo;
use App\Models\UserAnswerData;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class QuestionsController extends Controller
{
    public function saveUserInfo(Request $request)
    {

        //return $request;
        $date_now = Carbon::now();

        $submited_at = $date_now->format('Y-m-d H:i:s');
        //return $submited_at;
        $userInfo = new UserAnswersInfo();
        $userInfo->name = $request->name;
        $userInfo->phone = $request->phone;
        $userInfo->uic = $request->uic;
        $userInfo->submited_at = $submited_at;

        $userInfo->save();
        $user_id = $userInfo->id;
        //return $request->uic;
        return to_route('question', ['id' => $user_id]);
        //return redirect()->route('question', ['uic' => $request->uic]);

    }

    public function saveQuestion(Request $request)
    {
        $id = $request->input('id');
        $totalScore = $request->input('totalScore');
        $assessment = $request->input('assessment');
        $answeredData = $request->input('answered');

        $userList = UserAnswersInfo::select('id', 'name', 'phone', 'uic')->where('id', $id)->first();
        if ($userList) {
            foreach ($answeredData as $questionKey => $questionData) {
                $questionNumber = substr($questionKey, 8);
                $question = Questions::where('id', $questionNumber)->first();

                if ($question) {
                    $answeredQuestion = new UserAnswerData();
                    $answeredQuestion->info_id = $userList->id;
                    $answeredQuestion->questions_id = $question->id;
                    $answeredQuestion->answer_no = $questionData['answer_score'];
                    $answeredQuestion->save();
                }
            }
        }

        return to_route('success', ['id' => $id]);
    }

    public function getAllQuestionsAndAnswers()
    {
        $questions = Questions::with('answers')->get();

        $data = $questions->toArray();

        return array_map(function ($item) {
            return [
                "questions_id" => $item['no'],
                "never" => $item['answers'][0]['value'],
                "middle" => $item['answers'][1]['value'],
                "big" => $item['answers'][2]['value'],
                "biggest" => $item['answers'][3]['value'],
                "question" => $item['title'],
                "selectedAnswer" => null,
            ];
        }, $data);
    }

    public function getUserAnswerData(Request $request)
    {
        $getUserAnswerData = UserAnswerData::select('id', 'info_id', 'questions_id', 'answer_no')
            ->where('info_id', $request->input('id'))
            ->get();

        return $getUserAnswerData;
    }
}
