<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\UserAnswers;
use App\Models\UserAnswersInfo;
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
        $name = $request->name;
        $phone = $request->phone;
        $uic = $request->uic;
        $date_now = Carbon::now();

        $submited_at = $date_now->format('Y-m-d H:i:s');

        //return $submited_at;

        // Create a new UserAnswersInfo instance and set its properties
        $userInfo = new UserAnswersInfo();
        $userInfo->name = $name;
        $userInfo->phone = $phone;
        $userInfo->uic = $uic;
        $userInfo->submited_at = $submited_at;

        // Save the user information to the database
        $userInfo->save();

        // Redirect to a route
        return Redirect::route('question');
        //return Redirect::to('/question');

    }

    public function saveQuestion(Request $request)
    {
        $answered = $request['answered'];

        $userAnswer = new UserAnswers();
        $userAnswer->first_name = 'John';
        $userAnswer->last_name = 'Doe';
        $userAnswer->user_id_card = 123;
        $userAnswer->totalScore = $request['totalScore'];
        for ($i = 1; $i <= 15; $i++) {
            $questionKey = "question{$i}";
            if (isset($answered[$questionKey])) {
                $userAnswer->$questionKey = json_encode($answered[$questionKey]);
            }
        }
        $userAnswer->save();


        return redirect()->route('success');
    }
}
