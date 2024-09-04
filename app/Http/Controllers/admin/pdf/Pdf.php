<?php
namespace App\Http\Controllers\admin\pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Controller;
use App\SubQuadrant;
use App\FriendsSubQuadrant;
use DB, View, Validator, Route, Auth, File, Carbon\Carbon, Mail, URL, Excel;
class Pdf extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index(Request $request) {
        $this->data['content'] = SubQuadrant::join('score', 'score.id', '=', 'sub_quadrant.score_id')->select('score.behavior as p_behavior', 'sub_quadrant.*')->get();
        return View::make('admin.pdf.index')->with('data', $this->data);
    }
    public function update(Request $request, $id) {
        $this->data['content'] = SubQuadrant::join('score', 'score.id', '=', 'sub_quadrant.score_id')->select('score.behavior as p_behavior', 'sub_quadrant.*')->where('sub_quadrant.id', $id)->first();
        if ($request->isMethod('post')) {
            $this->data['content']->p_content = $request->p_content;
            $this->data['content']->s_content = $request->s_content;
            $this->data['content']->save();
            return redirect()->back()->with('message',  'Update Successfully.');
        }
        return View::make('admin.pdf.update')->with('data', $this->data);
    }
    public function friends_index(Request $request) {
        $this->data['content'] = FriendsSubQuadrant::join('score', 'score.id', '=', 'friend_sub_quadrant.score_id')->select('score.behavior as p_behavior', 'friend_sub_quadrant.*')->get();
        return View::make('admin.friends_pdf.index')->with('data', $this->data);
    }
    public function friends_update(Request $request, $id) {
        $this->data['content'] = FriendsSubQuadrant::join('score', 'score.id', '=', 'friend_sub_quadrant.score_id')->select('score.behavior as p_behavior', 'friend_sub_quadrant.*')->where('friend_sub_quadrant.id', $id)->first();
        if ($request->isMethod('post')) {
            $this->data['content']->p_content = $request->p_content;
            $this->data['content']->s_content = $request->s_content;
            $this->data['content']->save();
            return redirect()->back()->with('message',  'Update Successfully.');
        }
        return View::make('admin.friends_pdf.update')->with('data', $this->data);
    }
}
