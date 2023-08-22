<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\UserAnswers;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function saveQuestion(Request $request)
    {

        if (isset($request['answered']) && is_array($request['answered'])) {
            foreach ($request['answered'] as $questionNumber => $answerData) {

                return $answerData;
                $userAnswer = new UserAnswers();

                $userAnswer->first_name = 'John';
                $userAnswer->last_name = 'Doe';
                $userAnswer->user_id_card = 123;
                $userAnswer->totalScore = $request['totalScore'];
                $userAnswer->question_number = $questionNumber;
                $userAnswer->answer_timestamp = $answerData['answer_timestamp'];
                $userAnswer->answer_choice = $answerData['answer_choice'];
                $userAnswer->answer_score = $answerData['answer_score'];

                $userAnswer->save();
            }
        }
    }
}


// {
//     "totalScore": 18,
//     "answered": {
//         "question1": {
//             "answer_timestamp": "2023-08-22T09:52:32.135Z",
//             "answer_choice": 3,
//             "answer_score": "2"
//         },
//         "question2": {
//             "answer_timestamp": "2023-08-22T09:52:32.995Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question3": {
//             "answer_timestamp": "2023-08-22T09:52:33.254Z",
//             "answer_choice": 2,
//             "answer_score": "2"
//         },
//         "question4": {
//             "answer_timestamp": "2023-08-22T09:52:33.471Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question5": {
//             "answer_timestamp": "2023-08-22T09:52:33.750Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question6": {
//             "answer_timestamp": "2023-08-22T09:52:33.990Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question7": {
//             "answer_timestamp": "2023-08-22T09:52:34.215Z",
//             "answer_choice": 2,
//             "answer_score": "2"
//         },
//         "question8": {
//             "answer_timestamp": "2023-08-22T09:52:34.452Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question9": {
//             "answer_timestamp": "2023-08-22T09:52:34.693Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question10": {
//             "answer_timestamp": "2023-08-22T09:52:34.932Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question11": {
//             "answer_timestamp": "2023-08-22T09:52:35.164Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question12": {
//             "answer_timestamp": "2023-08-22T09:52:35.398Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question13": {
//             "answer_timestamp": "2023-08-22T09:52:35.614Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question14": {
//             "answer_timestamp": "2023-08-22T09:52:35.832Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         },
//         "question15": {
//             "answer_timestamp": "2023-08-22T09:52:36.132Z",
//             "answer_choice": 2,
//             "answer_score": "1"
//         }
//     }
// }
