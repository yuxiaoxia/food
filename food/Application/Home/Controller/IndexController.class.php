<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
      $order = M('order');

      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      $seat = M('seat');
//未处理订单
      $unordernum = $order->where('ostatus=0')->count();
      $this->assign('unordernum',$unordernum);

//未确认订座
      $unseatnum = $orderSeat->where('status=0')->count();
      $this->assign('unseatnum',$unseatnum);

//空闲桌台有
      $seatnum = $seat->where('status=0')->count();
      $this->assign('seatnum',$seatnum);


//今日订单
      $t = time();
      $start = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));
      $end = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t));
      $ordernum = 0;
      $ordertime = $order->where('ostatus=2')->getField('ordertime',true);

      for( $i=0;$i<count($ordertime);$i++)
      {
          $time = strtotime($ordertime[$i]);
          if( $time>=$start&&$time<=$end ){
              $ordernum++;
          }
      }
      $this->assign('ordernum',$ordernum);
      $this->display();
    }


}
