<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminerController extends Controller
{
    public function dashboard()
    {

        $examinations = Examination::with('examiner')->where('examiner_id', Auth::id())->get();

        $examDetails = $examinations->map(function ($examinations) {
            $startDateTime = Carbon::createFromFormat('Y-m-d H:i:s', "{$examinations->start_date} {$examinations->start_time}");
            $endDateTime = Carbon::createFromFormat('Y-m-d H:i:s', "{$examinations->end_date} {$examinations->end_time}");

            $now = Carbon::now();

            // Custom "Starts in" format
            if ($startDateTime->greaterThan($now)) {
                $diff = $now->diff($startDateTime);
                $startsIn = ($diff->d ? $diff->d . ' days ' : '')
                    . ($diff->h ? $diff->h . ' hours ' : '')
                    . ($diff->i ? $diff->i . ' minutes' : '');
            } else {
                $startsIn = 'Already started';
            }
            // Calculate Ended X hours ago
            $ended = $endDateTime->lessThan($now)
                ? $endDateTime->diffForHumans($now, true) . ' ago'
                : 'Not ended yet';

            return [
                'examinations' => $examinations,
                'starts_in' => $startsIn,
                'ended' => $ended,
            ];
        });

        return view('examiner.dashboard', ['examDetails' => $examDetails]);
    }
}
