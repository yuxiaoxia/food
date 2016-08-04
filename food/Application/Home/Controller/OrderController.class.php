<?php
namespace Home\Controller;
// 本类由系统自动生成，仅供测试用途
class OrderController extends CommonController {
    public function index(){
      header('Content-Type:text/html;charset=utf-8');
      $order = M('order');
      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      $orderData = $order->join('food_orderseat ON food_order.orderseatid = food_orderseat.id')->where('ostatus=0')->order("id desc")->select();

      foreach($orderData as $n=> $val){
          $orderData[$n]['food']=$orderFood->where('orderseatid='.$val['orderseatid'].'')->select();
      }
      $this->assign('order',$orderData);

	    $this->display();
    }
    public function unhandled(){
      $order = M('order');
      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      $orderData = $order->join('food_orderseat ON food_order.orderseatid = food_orderseat.id')->where('ostatus=0')->order("id desc")->select();

      foreach($orderData as $n=> $val){
          $orderData[$n]['food']=$orderFood->where('orderseatid='.$val['orderseatid'].'')->select();
      }
      $this->assign('order',$orderData);
      $this->display("unhandled");
    }
    public function unfinished(){
      $order = M('order');
      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      $orderData = $order->join('food_orderseat ON food_order.orderseatid = food_orderseat.id')->where('ostatus=1')->order("id desc")->select();

      foreach($orderData as $n=> $val){
          $orderData[$n]['food']=$orderFood->where('orderseatid='.$val['orderseatid'].'')->select();
      }
      $this->assign('order',$orderData);
      $this->display("unfinished");
    }
    public function finished(){
      $order = M('order');
      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      $orderData = $order->join('food_orderseat ON food_order.orderseatid = food_orderseat.id')->where('ostatus=2')->order("id desc")->select();

      foreach($orderData as $n=> $val){
          $orderData[$n]['food']=$orderFood->where('orderseatid='.$val['orderseatid'].'')->select();
      }
      $this->assign('order',$orderData);
      $this->display("finished");
    }


    public function orderStatus(){
      $order = M('order');
      $seat = M('seat');
      $orderseat = M('orderseat');
      $orderfood = M('orderfood');
      $caipu =  M('caipu');
      $oid = I('post.oid');
      if($oid){
        $ostatus = I('post.ostatus');
        $data['ostatus'] = I('post.ostatus');
        if($ostatus == "2"){
//修改订单状态和时间
          $data['finishtime'] = date( "Y-m-d H:i:s",time() );
          $orderseatid = $order->where('oid='.$oid)->getField('orderseatid');
//修改菜谱销量
          $foodselect = $orderfood->where('orderseatid='.$orderseatid)->select();
          for( $j=0;$j<count($foodselect);$j++)
          {
            $foodid = $foodselect[$j]['foodid'];
            $foodnum = $foodselect[$j]['foodnum'];
            $caipu->where('id='.$foodid)->setInc('sold',$foodnum);
          }
//修改状态和时间
          $orderseatdata['status'] = 2;
          $orderseatdata['finishtime'] = date( "Y-m-d H:i:s",time() );
          $orderseat->where('id='.$orderseatid)->save($orderseatdata);
//修改座位状态
          $seatid = $orderseat->where('id='.$orderseatid)->getField('seatid');
          $seats['status'] = 0;
          $seat->where('id='.$seatid)->save($seats);
        }
        $order->where('oid='.$oid)->save($data);
        $this->success("ok");
      }
    }
    public function delOrder(){
      $order = M('order');
      $orderseat = M('orderseat');
      $seat = M('seat');
      $orderfood = M('orderfood');

      $oid = $_POST['dataId'];
      $orderseatid = $_POST['dataSeatid'];

      $seats['status'] = 0;

      for( $i=0;$i<count($oid);$i++)
      {
        $order->where('oid='.$oid[$i])->delete();
      }
      for( $j=0;$j<count($orderseatid);$j++)
      {
        $seatid = $orderseat->where('id='.$orderseatid[$j])->getField('seatid');
        $seat->where('id='.$seatid)->save($seats);
        $orderseat->where('id='.$orderseatid[$j])->delete();

        $orderfood->where('orderseatid='.$orderseatid[$j])->delete();
      }
      $this->success("ok");
    }
    public function search(){
      $where = I("get.search");


      $order = M('order');
      $orderSeat = M('orderseat');
      $orderFood = M('orderfood');

      if($where){
          $cp = $Caipu->where($where)->select();
      }

      $orderData = $order->where('ostatus=2')->order("id desc")->select();

      foreach($orderData as $n=> $val){
          $orderData[$n]['food']=$orderFood->where('orderseatid='.$val['orderseatid'].'')->select();
      }

      $this->assign('order',$orderData);
      $this->display("finished");



    }
}
