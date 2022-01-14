<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index($topicId = 0) {
        $data = array('selectedTopic' => $topicId);
        $data['topics'] = DB::select('select * from Topics');
        if($topicId == 0) {
            $data['blocks'] = DB::table('Blocks')->join('Topics', 'Blocks.topicId', '=', 'Topics.id')->get();
        } else {
            $data['blocks'] = DB::table('Blocks')->where('topicId', '=', $topicId)->join('Topics', 'Blocks.topicId', '=', 'Topics.id')->get();
        }
        return view('home.index', $data);
    }
}
