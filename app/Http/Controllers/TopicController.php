<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Subject;
use App\Models\Topic;
use Inertia\Inertia;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();
        return Inertia::render('Topics/Index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $subject = $_GET['subject'] ?? null;
        if(isset($_GET['topic_id'])){
            $topic = Topic::find($_GET['topic_id']);
        }else{
            $topic = null;
        }
        $topics = Topic::all();
        return Inertia::render('Topics/Create', compact(['subject','subjects','topics','topic']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = Topic::create([
            'subject_id' => $request->input('subject_id'),
            'topic_id' => $request->input('topic_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('topics.show', $topic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $subject = $topic->subject;
        $parent = $topic->parent;
        $impulses = $topic->impulses()->get();
        $topics = $topic->subtopics()->get();
        return Inertia::render('Topics/Show', compact(['topic', 'topics', 'impulses', 'subject', 'parent']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
