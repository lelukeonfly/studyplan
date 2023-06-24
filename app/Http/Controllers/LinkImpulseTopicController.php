<?php

namespace App\Http\Controllers;

use App\Models\Impulse;
use App\Models\Topic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LinkImpulseTopicController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show()
    {
        $topics = Topic::all();
        $impulses = Impulse::all();
        return Inertia::render('ImpulseTopic', compact(['topics', 'impulses']));
    }

    public function link(Request $request)
    {
        $topic_id = $request->input('topic_id');
        $impulse_id = $request->input('impulse_id');
        Impulse::find($impulse_id)->topics()->attach($topic_id);
        return redirect()->route('impulses.show', $impulse_id);
    }
}
