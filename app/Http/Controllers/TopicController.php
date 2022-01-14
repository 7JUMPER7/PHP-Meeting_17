<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $topics = Topic::all();
        return view('topic.index', array('topics' => $topics));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('topic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $messages = [
            'unique' => 'Value :attribute should be unique',
            'required' => 'Field :attribute is required'
        ];
        $this->validate($request, ['topicname' => 'required|string|unique:topics,topicName'], $messages);
        $topic = new Topic();
        $topicname = $request->topicname;
        $topic->topicname = $topicname;
        if(!$topic->save()) {
            $errors = $topic->getErrors();
            var_dump($errors);
            return redirect()->action([TopicController::class, 'create'])->with('errors', $errors);
        }
        return redirect()->action([TopicController::class, 'create'])->with('message', 'Successfully created');
        // return redirect('topic');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $topic = Topic::all()->where('id', $id)->first();
        return view('topic.show', array('topic' => $topic));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
