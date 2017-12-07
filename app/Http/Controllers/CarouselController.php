<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/10/25
 * Time: 16:56
 */

namespace App\Http\Controllers\Auth;

use App\Carousel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function add(Request $request){
        if ($carousel = $request->file('carousel')){

        }else{
            return response()->json(['code'=>2,'msg'=>'请插入轮播图']);
        }
        if ($order = $request->order){

        }else{
            return response()->json(['code'=>3,'msg'=>'请输入序号']);
        }
        $obj = new Carousel();
        return $obj->add($carousel,$order);
    }
    public function del(Request $request){
        if ($order = $request->order){

        }else{
            return response()->json(['code'=>3,'msg'=>'请输入序号']);
        }
        $obj = new Carousel();
        return $obj->del($order);
    }
    public function show(){
        $obj = new Carousel();
        return $obj->show();
    }
}