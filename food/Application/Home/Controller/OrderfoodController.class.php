<?php
namespace Home\Controller;
// 本类由系统自动生成，仅供测试用途
class OrderfoodController extends CommonController {
    public function index(){
      $Caipu = M('Caipu');
      $Cat = M('Cat');
     if(IS_GET){
       $fenleidata = $Cat->where('pid!=0')->select();
       if(isset($_GET['page'])&&$_GET['page']){
         $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,caipu.newprice,cat.name,caipu.sold,caipu.Cstatus')->where('1')->order("id desc")->select();
       }else{
         $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,caipu.newprice,cat.name,caipu.sold,caipu.Cstatus')->where('1')->order("id desc")->select();
       }
       $count = count($cp);
       $this->assign('count',$count);
       $this->assign('fenleidata',$fenleidata);
       $this->assign('data',$cp);
     }
	    $this->display();
    }

    public function orderFood(){
      $Caipu = M('Caipu');
      $Cat = M('Cat');
     if(IS_GET){

       $fenleidata = $Cat->where('pid!=0')->select();
       $where = I("get.search");

       if($where){
           $cp = $Caipu->where($where)->select();
       }

       else{
         if(isset($_GET['page'])&&$_GET['page']){
           $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,caipu.newprice,cat.name,caipu.sold,caipu.Cstatus')->where('1')->order("id desc")->select();

         }else{
           $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,caipu.newprice,cat.name,caipu.sold,caipu.Cstatus')->where('1')->order("id desc")->select();

         }
       }

       $count = count($cp);
       $this->assign('count',$count);
       $this->assign('fenleidata',$fenleidata);
       $this->assign('data',$cp);
       $this->display("orderFood");
     }
     if(IS_POST){
      //  $orderseatid = I('post.orderseatid');
      //  $data = json_decode($_POST['data'],true);
      //  dump($data);
      $orderseatid = $_POST['orderseatid'];
      $data = $_POST['data'];
      $foodData = json_decode($data,true);

      $orderFood = M('Orderfood');
      $order = M('Order');
      $orderSeat = M('Orderseat');

//修改orderseat表的orderid字段为1，表示预定的时候还下单了
      $orderid['orderid']=1;
      $orderSeat->where('id='.$orderseatid)->save($orderid);

//把点餐单存入$orderFood
      $food = array();
      for( $j=0;$j<count($foodData);$j++)
      {
        $food['orderseatid'] = $orderseatid;
        $food['foodid'] = $foodData[$j]['id'];
        $food['foodname'] = $foodData[$j]['name'];
        $food['foodnum'] = $foodData[$j]['num'];
        $food['foodprice'] = $foodData[$j]['price'];
        $food['foodtotalmoney'] = $foodData[$j]['money'];
        $orderFood->add($food);
      }
//把点餐信息存入$order、
      $condition['orderseatid'] = $orderseatid;
      $num = $orderFood->where($condition)->sum('foodnum');
      $money = $orderFood->where($condition)->sum('foodtotalmoney');
      $orderData['orderseatid'] = $orderseatid;
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

    }
}
