<?php
namespace App\Library;
use App\Library\CommonLibrary;

/*
 * Api共通関数を作成
 * --命名規則
 * ・get〜：一つの情報を取得
 * ・list〜：複数の情報を取得
 */
class ApiLibrary
{
    /*
     * チームIDからチーム情報を取得
     */
    static public function getTeamData($_id){
        
        $res = CommonLibrary::getApiData(config('const.API_URL')."v2/teams/team/".$_id);
        
        $count = $res['results'];
        $data = $res['teams'][0];
        
        return [$count,$data];
    }
}
