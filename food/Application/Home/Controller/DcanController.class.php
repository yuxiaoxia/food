<?php
namespace Home\Controller;
use Think\Controller;
class DcanController extends CommonController {
    public function index(){
      $orderseat = M('orderseat');
      $data1 = $orderseat->order("id desc")->where('orderid=0')->select();
      $count = count($data1);
      $this->assign('count',$count);
      $this->assign('data',$data1);
      $this->display();

    }
    public function slist(){
      $orderseat = M('orderseat');
      if(IS_GET){
        $where = I('get.search');
        if($where){
          $data = $orderseat->where($where)->select();
          $count = count($data);
        }
        else{
          $data = $orderseat->order("id desc")->where('orderid=0')->select();
          $count = count($data1);
        }
        $this->assign('count',$count);
        $this->assign('data',$data);
        $this->display("slist");
      }

    }
    //检查座位是否被预定
    public function check(){
      $seatId = I('post.id');
      $seat = M('Seat');
      $status = $seat->where('id='.$seatId)->getField('status');
      if( $status == 0 ){
         $this->success("ok");
       }
       else if( $status == 1 ){
         $this->success("该座位已被预订，请重新选择");
       }

    }
    //预定座位
    public function orderSeat(){
      $seat = M('Seat');
      if(IS_GET){
        $where = I('get.search');

        if($where){
          $data = $seat->where($where)->select();

        }
        else{
          $data = $seat->order("id desc")->select();

        }

        $this->assign('data',$data);
        $this->display("orderSeat");
      }
      if(IS_POST)
      {
        $orderseat['seatid'] = I('post.seatid');
        $orderseat['gkname'] = I('post.gkname');
        $orderseat['gkphone'] = I('post.gkphone');
        $orderseat['gkbz'] = I('post.gkbz');
        $orderseat['status'] = 1;
        $orderseat['ordertime'] = date( "Y-m-d H:i:s",time() );

        $orderSeat = M('Orderseat');
        $orderseatid = $orderSeat->add($orderseat);
        $seatId = I('post.seatid');

        $seat = M('Seat');

        $data['status'] = 1;
        $seat->where('id='.$seatId)->save($data);

        $this->success($orderseatid);

      }

    }
    //修改预定座位的状态
    public function statusOrderSeat(){
      if(IS_POST){
        $orderseat = M('Orderseat');
        $id = I('post.id');
        $status = I('post.status');
        if( $status== 2 ){
          $seatid = I('post.seatid');
          $seat = M('Seat');
          $dataseat['status'] = 0;
          $seat->where('id='.$seatid)->save($dataseat);
        }
        $data['status'] = $status;
        $orderseat->where('id='.$id)->save($data);
        $this->success("ok");
      }
    }
    //删除订座订单
    public function delOrderSeat(){
      if(IS_POST){

        $orderseat = M('Orderseat');
        $seat = M('Seat');

        $id = I('post.id');
        $seatid = I('post.seatid');
        $status = 0;

        $dataseat['status'] = $status;

        $seat->where('id='.$seatid)->save($dataseat);

        $orderseat->where('id='.$id)->delete();
        $orderseat->save();
        $this->success("ok");
      }
    }
}
