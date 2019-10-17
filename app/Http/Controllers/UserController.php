<?php

namespace App\Http\Controllers;
use App\Library\CommonLibrary;
use App\Library\ApiLibrary;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index($_id)
    {
        // DBよりUserテーブルの値を全て取得
        $users = User::all();
        
        list($count,$datas) = ApiLibrary::getTeamData($_id);
        
        // 取得した値をビュー「user/index」に渡す
        return view('user/index', compact('users','count','datas'));
    }
}
