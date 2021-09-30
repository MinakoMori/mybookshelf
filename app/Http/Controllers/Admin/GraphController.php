<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Book;
use DB;

class GraphController extends Controller
{
    public function index1()
    {
        $end_date = date("Y-m-d");
        $before_1year = date("Y-m-01",strtotime("-1 year"));
        $before_1year = date("Y-m-d", strtotime($before_1year."+1 month"));
        
        $arrCount = Array();
        
        for ($i = $before_1year; $i <= $end_date; $i = date("Y-m-d", strtotime($i . "+1 month"))) {
            $buy_count = Book::where('buy_date','like',substr($i,0,8)."%")->where('user_id',Auth::id())->count();
            $arrCount[substr($i,5,2)] = $buy_count;
        }
        
        //dd($arrCount);
        
        $this_month = Book::where('buy_date','like',date('Y-m')."%")->where('user_id',Auth::id())->count();
        $last_month = Book::where('buy_date','like',date('Y-m',strtotime("-1 month"))."%")->where('user_id',Auth::id())->count();
        
        $this_month_f = Book::where('finish_date','like',date('Y-m')."%")->where('user_id',Auth::id())->count();
        $last_month_f = Book::where('finish_date','like',date('Y-m',strtotime("-1 month"))."%")->where('user_id',Auth::id())->count();
        
        return view('admin.books.graph1', [
            'arrCount' => $arrCount,
            'this_month' => $this_month,
            'last_month' => $last_month,
            'this_month_f' => $this_month_f,
            'last_month_f' => $last_month_f
            ]);
    }
    
    public function index2()
    {
        $end_date = date("Y-m-d");
        $before_1year = date("Y-m-01",strtotime("-1 year"));
        $before_1year = date("Y-m-d", strtotime($before_1year."+1 month"));
        
        $arrCount = Array();
        
        for ($i = $before_1year; $i <= $end_date; $i = date("Y-m-d", strtotime($i . "+1 month"))) {
            $money_count = Book::where('buy_date','like',substr($i,0,8)."%")->where('user_id',Auth::id())->sum('money');
            //if (substr($i,5,2) == "01") {
            //    $arrCount[substr($i,0,4).substr($i,5,2)] = $money_count;
            //} else {
               $arrCount[substr($i,5,2)] = $money_count;
            //}
        }
        
        $this_month = Book::where('buy_date','like',date('Y-m')."%")->where('user_id',Auth::id())->sum('money');
        $last_month = Book::where('buy_date','like',date('Y-m',strtotime("-1 month"))."%")->where('user_id',Auth::id())->sum('money');
        $difference_month = $this_month - $last_month;
        
        //dd($arrCount);
        
        //$sum_this_month = Book::where('money', '>', '0')->sum();
        
        return view('admin.books.graph2', [
            'arrCount' => $arrCount,
            'this_month' => $this_month,
            'last_month' => $last_month,
            'difference_month' => $difference_month
            ]);
            
        //return view('admin.books.graph2');
    }
    
    public function index3()
    {
        $genre_friendship_count = Book::where('genre_friendship',1)->where('user_id',Auth::id())->count();
        $genre_love_count = Book::where('genre_love',1)->where('user_id',Auth::id())->count();
        $genre_action_count = Book::where('genre_action',1)->where('user_id',Auth::id())->count();
        $genre_sf_horror_count = Book::where('genre_sf_horror',1)->where('user_id',Auth::id())->count();
        $genre_mystery_count = Book::where('genre_mystery',1)->where('user_id',Auth::id())->count();
        $genre_fantasy_count = Book::where('genre_fantasy',1)->where('user_id',Auth::id())->count();
        $genre_history_count = Book::where('genre_history',1)->where('user_id',Auth::id())->count();
        $genre_nonfiction_count = Book::where('genre_nonfiction',1)->where('user_id',Auth::id())->count();
        $genre_essay_count = Book::where('genre_essay',1)->where('user_id',Auth::id())->count();
        $genre_business_count = Book::where('genre_business',1)->where('user_id',Auth::id())->count();
        
        $genre_all_count = $genre_friendship_count
                            + $genre_love_count
                            + $genre_action_count
                            + $genre_sf_horror_count
                            + $genre_mystery_count
                            + $genre_fantasy_count
                            + $genre_history_count
                            + $genre_nonfiction_count
                            + $genre_essay_count
                            + $genre_business_count;
        
        if ($genre_all_count == 0) {
            $genre_friendship_ratio = 0;
            $genre_love_ratio = 0;
            $genre_action_ratio = 0;
            $genre_sf_horror_ratio = 0;
            $genre_mystery_ratio = 0;
            $genre_fantasy_ratio = 0;
            $genre_history_ratio = 0;
            $genre_nonfiction_ratio = 0;
            $genre_essay_ratio = 0;
            $genre_business_ratio = 0;
        } else {
            $genre_friendship_ratio = round($genre_friendship_count / $genre_all_count, 2);
            $genre_love_ratio = round($genre_love_count / $genre_all_count, 2);
            $genre_action_ratio = round($genre_action_count / $genre_all_count, 2);
            $genre_sf_horror_ratio = round($genre_sf_horror_count / $genre_all_count, 2);
            $genre_mystery_ratio = round($genre_mystery_count / $genre_all_count, 2);
            $genre_fantasy_ratio = round($genre_fantasy_count / $genre_all_count, 2);
            $genre_history_ratio = round($genre_history_count / $genre_all_count, 2);
            $genre_nonfiction_ratio = round($genre_nonfiction_count / $genre_all_count, 2);
            $genre_essay_ratio = round($genre_essay_count / $genre_all_count, 2);
            $genre_business_ratio = round($genre_business_count / $genre_all_count, 2);
        }
        
         //dd($genre_friendship_ratio,$genre_love_ratio,$genre_action_ratio,$genre_sf_horror_ratio,$genre_mystery_ratio,$genre_fantasy_ratio,$genre_history_ratio,$genre_nonfiction_ratio,$genre_essay_ratio,$genre_business_ratio);
         
        $status1 = Book::where('category',1)->where('user_id',Auth::id())->count();
        $status2 = Book::where('category',2)->where('user_id',Auth::id())->count();
        $status3 = Book::where('category',3)->where('user_id',Auth::id())->count();
        $status4 = Book::where('category',4)->where('user_id',Auth::id())->count();
        $status5 = Book::where('category',5)->where('user_id',Auth::id())->count();
        
        $status_all_count = $status1
                            + $status2
                            + $status3
                            + $status4
                            + $status5;
        
        if ($status_all_count == 0) {
            $status1_ratio = 0;
            $status2_ratio = 0;
            $status3_ratio = 0;
            $status4_ratio = 0;
            $status5_ratio = 0;
        } else {
            $status1_ratio = round($status1 / $status_all_count, 2);
            $status2_ratio = round($status2 / $status_all_count, 2);
            $status3_ratio = round($status3 / $status_all_count, 2);
            $status4_ratio = round($status4 / $status_all_count, 2);
            $status5_ratio = round($status4 / $status_all_count, 2);
        }
        
        return view('admin.books.graph3', [
            'genre_all_count' => $genre_all_count,
            'genre_friendship_ratio' => $genre_friendship_ratio,
            'genre_love_ratio' => $genre_love_ratio,
            'genre_action_ratio' => $genre_action_ratio,
            'genre_sf_horror_ratio' => $genre_sf_horror_ratio,
            'genre_mystery_ratio' => $genre_mystery_ratio,
            'genre_fantasy_ratio' => $genre_fantasy_ratio,
            'genre_history_ratio' => $genre_history_ratio,
            'genre_nonfiction_ratio' => $genre_nonfiction_ratio,
            'genre_essay_ratio' => $genre_essay_ratio,
            'genre_business_ratio' => $genre_business_ratio,
            'status_all_count' => $status_all_count,
            'status1_ratio' => $status1_ratio,
            'status2_ratio' => $status2_ratio,
            'status3_ratio' => $status3_ratio,
            'status4_ratio' => $status4_ratio,
            'status5_ratio' => $status4_ratio
            ]);
    }
}
