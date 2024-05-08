<?php

namespace App\Http\Controllers\Admin\v1;

use App\Http\Controllers\Controller;
use App\Models\Notation;
use App\Models\NotationCriterion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityRankingController extends Controller
{
    public function showRankings(Request $request)
    {
        $criteriaOptions = NotationCriterion::all();

        $selectedCriteria = $request->input('criteria', []);

        $perPage = 5;

        if (count($selectedCriteria) > 0) {
            $rankedUniversities = Notation::with('university')
                ->whereIn('notation_criterion_id', $selectedCriteria)
                ->orderBy('note','asc' )
                ->paginate($perPage);

        } else {
            $rankedUniversities = Notation::with('university')
                ->orderBy('note','asc')
                ->paginate($perPage);
        }

        return view('admin.universities.ranking', compact('criteriaOptions', 'rankedUniversities'));
    }
}
