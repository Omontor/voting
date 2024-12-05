<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoteRequest;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use App\Models\Candidate;
use App\Models\Vote;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class VoteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vote_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $votes = Vote::with(['candidate'])->get();

        return view('frontend.votes.index', compact('votes'));
    }

    public function create()
    {
        abort_if(Gate::denies('vote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userId = Auth::id();

        // Find a candidate the user hasn't voted for
        $candidate = Candidate::whereDoesntHave('votes', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();

        if (!$candidate) {
            return redirect(url('/home'))->with('message', 'Ya votaste por todos, vete a la verga. 😊');
        }

        return view('frontend.votes.create', compact('candidate'));
    }

    public function store(StoreVoteRequest $request)
    {
        $vote = Vote::create($request->all());

        return redirect()->back();
    }

    public function edit(Vote $vote)
    {
        abort_if(Gate::denies('vote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $candidates = Candidate::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vote->load('candidate');

        return view('frontend.votes.edit', compact('candidates', 'vote'));
    }

    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        $vote->update($request->all());

        return redirect()->route('frontend.votes.index');
    }

    public function show(Vote $vote)
    {
        abort_if(Gate::denies('vote_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vote->load('candidate');

        return view('frontend.votes.show', compact('vote'));
    }

    public function destroy(Vote $vote)
    {
        abort_if(Gate::denies('vote_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vote->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoteRequest $request)
    {
        $votes = Vote::find(request('ids'));

        foreach ($votes as $vote) {
            $vote->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
