<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\candidate;
use App\votes;
use App\User;
use App\positions;
use Session;
use Auth;

class ElectionController extends Controller
{
    public function viewCandidates(){
        $candidates = candidate::all()->groupBy(function($item){
            return positions::find($item->candidate_position_id)->position_name;
        });

        //get which positions user has voted for
        $positions_voted = votes::where('voter_id', '=', Auth::user()->id)
                    ->distinct()
                    ->get(['position_id']);

        return view('candidates.viewCandidates', ['candidates' => $candidates, 'positions_voted' => $positions_voted]);
    }

    //vote for a candidate
    public function voteCandidate(Request $request){
        //firstly we check if it's a valid candidate id
        $candidate = candidate::find($request->candidate_id);

        $position = positions::where('position_name', '=', $request->pos_id)->first();

        //if valid id then we get the id of the logged in user
        if($candidate != null){
            $user_id = Auth::user()->id;
            //then we store the vote
            return votes::create([
                'candidate_id' => $candidate->candidate_id,
                'voter_id' => $user_id,
                'position_id' => $position->position_id
            ]);
        }else{
            return 'There was an error';
        }
    }

    public function viewResults(){
        $candidates = candidate::all()->groupBy(function ($item){
            return positions::find($item->candidate_position_id)->position_name;
        });

        return view('results.viewResults', ['candidates'=>$candidates]);
    }

    public function newCandidate(){
        $positions = positions::all();
        return view('candidates.newCandidate', ['positions'=> $positions]);
    }

    public function createCandidate(Request $request){
        //first validate the data supplied
        $request->validate([
            'eng_ID' => 'required|max:255',
            'position' => 'required|integer',
        ]);

        //save the candidate
        //firstly check if user exists
        $user = user::where('eng_ID', '=', $request->eng_ID);
        if( ($user!= null) && candidate::where('candidate_user_id', '=', $user->first()->id)->exists()){
            Session::flash('candidate_save_error', 'Candidates are only allowed to stand for 1 position.');
            return redirect()->route('candidate.new');
        }elseif($user->exists() == true){
            candidate::create([
                'candidate_position_id' => $request->position,
                'candidate_user_id' => $user->first()->id,
                'candidate_image' => ''
            ]);
        }else{
            //come back to page with an success message
            Session::flash('candidate_save_error', 'Only registered users are eligible to be candidates');

            return redirect()->route('candidate.new');
        }

        //come back to page with an success message
        Session::flash('candidate_save_successful', 'Candidate saved successfully');

        return redirect()->route('candidate.new');
    }

    public function votersList(){
        //view all the voters
        $voters = votes::all();

        return view('vote.voters', ['voters' => $voters]);
    }
}
