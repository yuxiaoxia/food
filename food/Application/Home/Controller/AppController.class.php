<?php
namespace Home\Controller;
// 本类由系统自动生成，仅供测试用途
class AppController extends CommonController {
    public function __construct(){

    }
    public function index(){

    }
    public function checkSeat(){
      $seatId = I('post.id');
      $seat = M('Seat');

      $status = $seat->where('id='.$seatId)->getField('status');

      if( $status == 0 ){

        $this->success("ok");
      }
      else if( $status!=0 ){

        $this->success("no");

      }


    }
    public function order(){
      //获取菜单数据
      $data = $_POST['saveData'];
      //获取订座信息的id
      $orderfoodid = $_POST['orderseat'];

      $foods = array();
      for( $i=0;$i<count($data);$i++)
      {
        $foods[$i] = json_decode($data[$i],true);
      }

      $food = array();
      $orderData = array();
      //把菜单存入orderfood点餐表 ，id唯一，orderseatid对应orderseat订座表中的id字段，orderseatid重复表示该点餐有多个菜
      $orderFood = M('Orderfood');
      $order = M('Order');

      for( $j=0;$j<count($foods);$j++)
      {
        $food['orderseatid'] = $orderfoodid;
        $food['foodid'] = $foods[$j]['id'];
        $food['foodname'] = $foods[$j]['name'];
        $food['foodnum'] = $foods[$j]['num'];
        $food['foodprice'] = $foods[$j]['price'];
        $food['foodtotalmoney'] = $foods[$j]['money'];
		    $food['foodbz'] = $foods[$j]['bz'];
        $orderFood->add($food);
      }
      $condition['orderseatid'] = $orderfoodid;
      $num = $orderFood->where($condition)->sum('foodnum');
      $money = $orderFood->where($condition)->sum('foodtotalmoney');
      $orderData['orderseatid'] = $orderfoodid;
      $orderData['ordertime'] = date( "Y-m-d H:i:s",time() );
      $orderData['num'] = $num;
      $orderData['money'] = $money;
      if( $orderid = $order->add( $orderData ) ){
          $this->success($orderid);
      }
      else{
          $this->error("下单失败");
      }

    }
    public function orderSeat(){

      $hasOrder = I('post.orderid');
      $orderseat['seatid'] = I('post.seatid');
      $orderseat['gkname'] = I('post.gkname');
      $orderseat['gkphone'] = I('post.gkphone');
      $orderseat['gkbz'] = I('post.gkbz');
      $orderseat['orderid'] = $hasOrder;


      $orderseat['ordertime'] = date( "Y-m-d H:i:s",time() );
      $orderSeat = M('Orderseat');

      if( $orderSeatId = $orderSeat->add($orderseat) ){
        $seatId = I('post.seatid');
        $seat = M('Seat');
        $data['status'] = 1;
        $seat->where('id='.$seatId)->save($data);
        //订座成功返回该订座信息的唯一 id
        $this->success($orderSeatId);
      }

    }
    public function show(){

      if(IS_AJAX){
        $Tips = M('Tips');
        $result = $Tips->select();
        $this->ajaxReturn($result);
      }
    }
    /**
    *座位显示接口
    */
    public function show_seat(){
      if($_POST){
        if($_POST['pos']=='包间'){
          $pos = '1';
        }elseif($_POST['pos']=='大厅'){
          $pos = '0';
        }
        $con = mysql_connect('localhost', 'root', 'root')or die("Unable to connect to the MySQL!");
        mysql_select_db('food', $con);
        mysql_query('set names utf8');
        $result = mysql_query("SELECT * FROM food_seat where pos=".$pos);

        $res = array();
        while($row = mysql_fetch_array($result))
        {
          $data = array();
          $data['id']=$row['id'];
          $data['seatnum']=$row['seatnum'];
          $data['pos']=$_POST['pos'];
          $data['bjf']=$row['bjf'];
          $data['desc']=$row['desc'];
          $data['status']=$row['status'];
          $res[] = $data;
        }
        $info = json_encode($res);
        echo $info;
      }else{
        echo 0;
      }
    }
    /**
    * 获取菜单列表
    */
    public function get_food_list(){
      $con = mysql_connect('localhost', 'root', 'root')or die("Unable to connect to the MySQL!");
      mysql_select_db('food', $con);
      mysql_query('set names utf8');
      if($_POST){

        $pid = $_POST['pid'];
        if($pid==0){
          $sql = "select * from food_caipu";
        }
        else if($pid!=0){
          $sql = "select * from food_caipu where pid=$pid";
        }
        if(isset($_POST['sort'])&&isset($_POST['by'])&&$_POST['sort']&&$_POST['by']){
          $sql .= " order by ".$_POST['by']." ". $_POST['sort'];
        }
        $result = mysql_query($sql);
        $info = array();
        while($row = mysql_fetch_array($result))
        {
          $data = array();
          $data['id']=$row['id'];
          $data['Cname']=$row['Cname'];
          $data['newprice']=$row['newprice'];
          $data['oldprice']=$row['oldprice'];
          $data['sold']=$row['sold'];
          $data['cstatus']=$row['Cstatus'];
          $data['title']=$row['title'];
          $data['simg']=$row['simg'];
          $res[] = $data;
        }
        $info = json_encode($res);
        echo $info;
      }else{
        echo 0;
      }
    }
    /**
    *   返回菜谱详情
    */
    public function get_food_detail(){
      $con = mysql_connect('localhost', 'root', 'root')or die("Unable to connect to the MySQL!");
      mysql_select_db('food', $con);
      mysql_query('set names utf8');
      if($_POST){
        $id = $_POST['id'];
        $sql = "select * from food_caipu where id=$id";
        $result = mysql_query($sql);
        while($row = mysql_fetch_array($result)){
          $data = array();
		  $data['id']=$id;
          $data['gongxiao']=$row['gongxiao'];
          $data['Cname']=$row['Cname'];
          $data['newprice']=$row['newprice'];
          $data['oldprice']=$row['oldprice'];
          $data['kouwei']=$row['kouwei'];
          $data['desc']=$row['desc'];
          $data['prtime']=$row['prtime'];
          $data['zhuliao']=$row['zhuliao'];
          $data['title']=$row['title'];
          $data['bimg']=$row['bimg'];
          $res[] = $data;
        }
        $info = json_encode($res);
        echo $info;
      }else{
        echo 0;
      }
    }


    public function searchOrder(){
      if($_POST){
        $id = $_POST['orderid'];
        $order = M('Order');
        $status = $order->where('oid='.$id)->getField('ostatus');
        if($status==0){
          $this->success($status);
        }
        if($status==1){
          $this->success($status);
        }
        if($status==2){
          $this->success($status);
        }
        else{
          $this->error("失败了");
        }
      }
    }

    public function showTopfood(){

        $caipu = M('Caipu');
        $data = $caipu->order('sold desc')->limit(5)->select();
        $info = json_encode($data);
        echo $info;
        // echo "a";

    }
    public function show_rest(){

        $rest = M('Rest');
        $data = $rest->select();
        $info = json_encode($data);
        echo $info;
    }


  }
