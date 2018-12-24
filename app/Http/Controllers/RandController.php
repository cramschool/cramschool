<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandController extends Controller
{
    private function getrand_id(){
        $id_len = 3;//字串長度
        $id = '';
        $word = 'abcdefghjkmnpqrstuvwxyz';//字典檔 
        $len = strlen($word);//取得字典檔長度
     
        for($i = 0; $i < $id_len; $i++){ //總共取幾次
            $id .= $word[rand() % $len];//隨機取得一個字元
        }
        return $id;//回傳亂數帳號
    }
    private function getrand_id1(){
        $id_len = 4;
        $id = '';
        $word = '23456789';
        $len = strlen($word);
    
        for($i = 0; $i < $id_len; $i++){ 
            $id .= $word[rand() % $len];
        }
        return $id;
    }

    public function getRand(Request $request){
        $a=array();//初始化一個陣列要來存放所產生的亂數
 
        for($x=0;$x<1;$x++){ //$x=>要取得幾筆亂數帳號
            $b = $this->getrand_id();//取得亂數帳號
            if(!in_array($b,$a)){//判斷有沒有重覆
                array_push($a,$b);//將產生的亂數帳號加入陣列
            }else{$x-=1;}//有重覆再重新產生一筆
        }
        for($y=0;$y<1;$y++){ 
            $c = $this->getrand_id1();
            if(!in_array($c,$a)){
                array_push($a,$c);
            }else{$y-=1;}
        }
        for($x=0;$x<1;$x++){
            $company_license = $a[$x].$a[$y];//顯示結果
        }
        return view('vendor.adminlte.register', ["company_license" => $company_license]);
    }
}
