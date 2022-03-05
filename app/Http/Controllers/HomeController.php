<?php

namespace App\Http\Controllers;

use App\Models\UserSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $old_results = UserSearch::where("user_id",Auth::id())->get();
        return view('home')->with(['old_results'=>$old_results]);
    }

    public function Search(Request $request){
        $url = "https://www.google.com/search?q=".preg_replace("/\s+/",'+',$request->search);
        $result = base64_encode(file_get_contents($url));
        $usersearch = New UserSearch;
        $usersearch->user_id = Auth::id();
        $usersearch->search_query = $request->search;
        $usersearch->result = $result;
        $usersearch->save();
        return view('searchresult')->with(['usersearchid'=>$usersearch->id]);
    }

    public function ResultShow($id){
        $usersearch = UserSearch::find($id);
        return view('result')->with(['result'=>$usersearch->result]);
    }

    public function ResultView($id){
        $usersearch = UserSearch::find($id);
        return view('searchresult')->with(['usersearchid'=>$usersearch->id]);
    }

    /*public function ResultDownload($id){
        $usersearch = UserSearch::find($id);
        $pdf = PDF::loadView('result', ['result'=>$usersearch->result]);
        return $pdf->download('result.pdf');
    }*/
}
