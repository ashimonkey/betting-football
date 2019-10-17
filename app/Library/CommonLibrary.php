<?php
namespace App\Library;
/*
 * 共通関数を作成
 */
class CommonLibrary
{
    static public function getApiData($_url){
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL => $_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                    "x-rapidapi-host: " . config('const.API_HOST'),
                    "x-rapidapi-key: " . config('const.API_KEY'),
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        }
        
        $response = json_decode($response,true);
        $datas = $response['api'];
        
        return $datas;
    }
}
