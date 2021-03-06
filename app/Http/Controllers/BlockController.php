<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Topic;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = ['Blocks.id', 'Blocks.title', 'Blocks.content', 'Blocks.imagePath', 'Blocks.created_at', 'Topics.topicName'];
        $blocks = DB::table('Blocks')->join('Topics', 'Topics.Id', '=', 'Blocks.topicId')->get($query);
        return view('block.index', array('blocks' => $blocks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $res = Topic::all(['id', 'topicName']);
        // $topics = array();
        // foreach($res as $topic) {
        //     $topics += [$topic->id => $topic->topicName];
        // }
        $topics = Topic::pluck('topicName', 'id');
        return view('block.create', array('topics' => $topics));
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
        $block = new Block();
        $block->title = $request->title;
        $block->topicId = $request->topicId;
        $block->content = $request->content;
        if($request->file('photo')) {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path().'/images', $filename);
            $block->imagePath = 'images/'.$filename;
        }

        if(!$block->save()) {
            $errors = $block->getErrors();
            return redirect()->action([BlockController::class, 'create'])->with('errors', $errors)->withInput();
        }
        return redirect()->action([BlockController::class, 'create'])->with('message', 'Successfully created');
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
        $block = Block::all()->where('id', '=', $id)->first();
        if($block) {
            $topic = Topic::all()->where('id', '=', $block->topicId)->first();
            return view('block.show', array('block' => $block, 'topic' => $topic));
        }
        return redirect('/');
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
        $block = Block::find($id);
        if($block) {
            $topics = Topic::pluck('topicName', 'id');
            return view('block.edit', array('block' => $block, 'topics' => $topics));
        }
        return redirect('/');
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
        $block = Block::find($id);
        // $block->id = $id;
        $block->title = $request->title;
        $block->topicId = $request->topicId;
        $block->content = $request->content;
        if($request->file('photo')) {
            $filename = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path().'/images', $filename);
            $block->imagePath = 'images/'.$filename;
        }

        if(!$block->update()) {
            $errors = $block->getErrors();
            return redirect()->action([BlockController::class, 'edit'], [$id])->with('errors', $errors)->withInput();
        }
        return redirect()->action([BlockController::class, 'edit'], [$id])->with('message', 'Successfully created');
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
        $block = Block::find($id);
        $block->delete();
        return redirect()->action([HomeController::class, 'index']);
    }
}
