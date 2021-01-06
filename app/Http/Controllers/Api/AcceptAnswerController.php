<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Http\Controllers\Controller;

class AcceptAnswerController extends Controller
{
    public function __invoke(Answer $answer)
    {
        $this->authorize('accept', $answer);
        $answer->question->acceptBestAnswer($answer);

        return response()->json([
            'message' => "You have accepted this answer as best answer"
        ]);
    }
}