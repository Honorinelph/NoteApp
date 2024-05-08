<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Notation;
use App\Models\NotationCriterion;
use App\Models\University;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function listuniversities()
    {
        $universities = University::paginate(10);
        return view('frontend.listuniversities',compact('universities'));
    }


    public function classement(Request $request)
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

        return view('frontend.user.classement', compact('criteriaOptions', 'rankedUniversities'));
    }



    public function details(University $university)
    {
        /*dd($university->comments);*/
        return view('frontend.universityDetail',compact('university'));
    }

    public function store(Request $request, University $university)
    {

        $request->validate([
            'content' => 'required|string|max:255',

        ]);


        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->university_id = $university->id;
        $comment->setAttribute('content', $request->input('content'));
        $comment->save();


        return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
    }


}
