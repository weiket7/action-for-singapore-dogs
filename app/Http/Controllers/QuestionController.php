<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\Enums\QuestionStat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
  public function save(QuestionRequest $request, $question_id = null) {
    $question = new Question();
    if ($question_id) {
      $question = Question::find($request->get('question_id'));
    }
    return $question->saveQuestion($request->all());
    return $question_id;
  }
  
  public function get(Request $request, $question_id) {
    return Question::find($question_id);
  }
  
  public function all() {
    return Question::all();
  }
}