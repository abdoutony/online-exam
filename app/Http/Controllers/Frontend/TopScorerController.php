<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Examination;
use App\Model\ExamNotification;
use App\Model\QuestionTemplate;
use Illuminate\Http\Request;

class TopScorerController extends Controller
{
    public function index(){
        $current_date = date('Y-m-d H:i:00');
        $exam_notification_id = request()->exam_notification_id;
        $keyword = request()->keyword;

        $exams = ExamNotification::with('template.subject')
            ->where('start_date', '<', $current_date)->orderBy('start_date', 'DESC')->get();


        $results = Examination::with('user');
        if($exam_notification_id){
            $results = Examination::with('user')->where('exam_notification_id', $exam_notification_id);
        }

        if($keyword){

            $keyword = '%'.$keyword.'%';

            $results = $results->whereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'like', $keyword)
                    ->orWhere('last_name', 'like', $keyword);
            });
        }
        $results = $results->where('is_exam', true)
            ->orderBy('result', 'DESC')->paginate(15);

        return view('frontend.result.index', compact('results', 'exams'));
    }
}
