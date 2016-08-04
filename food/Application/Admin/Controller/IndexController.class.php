<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
  public function index(){
    $Title = array('餐厅信息', '餐厅信息编辑','用户管理');
    $this->assign('Title',$Title);

    //餐厅信息
    $Rest = M('Rest');
    $data = $Rest->select();
    $this->assign('data',$data);
    $this->display();



  }
  public function Rinfo(){
    //餐厅信息
    $Rest = M('Rest');
    $data = $Rest->select();
    $this->assign('data',$data);

    $this->display("Rinfo");
  }
  //user.html
  public function user(){
    $User = M('User');
    $user = $User->where('root<2')->select();
    $this->assign('user',$user);

    $userid = session('user_id');
    $root = $User->where('userid='.$userid)->getField('root');

    $this->assign('root',$root);
    $this->display("user");
  }
  public function deluser(){

    if(IS_POST){
      $id = I('post.id');
      $delUser = M('User');
      $delUser->where('userid='.$id)->delete();
      $delUser->save();
      $this->success("删除成功");
    }
  }
  public function updateroot(){
    if(IS_POST){
      $id = I('post.id');
      $where['root'] = I('post.root');
      $User = M('User');
      $User->where('userid='.$id)->save($where);
      $this->success("修改成功");
    }
  }
  //餐厅信息编辑
  public function rupdate(){

    $qest = M('Rest');
    $data1 = $qest->select();
    $this->assign('data1',$data1);
    $this->display("rupdate");
  }

  // 更改餐厅信息
  public function Redit(){
    $Rest = M('Rest');
    $data = $Rest->create();
    $Rest->save($data);
    $this->success("修改成功");
  }


  //删除图片
  public function Delete(){
    // $src = I('post.src');
    // $img = M('Img');
    // if(IS_AJAX){
    //   $img->delete($src);
    //   $img->save();
    //   $this->success("删除成功");
    // }
  }

  // 添加图片
  public function Addimg(){
    $src = explode(';',I('post.imgsrc'));
    echo $src;
  }

}
