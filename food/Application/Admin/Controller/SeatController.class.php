<?php
namespace Admin\Controller;
// 本类由系统自动生成，仅供测试用途
class SeatController extends CommonController {
    public function index(){
      $seat = M('Seat');
      $data = $seat->select();
      $this->assign('data',$data);
	    $this->display();
    }
    public function seatlist(){
      $seat = M('Seat');
      $data = $seat->select();
      $this->assign('data',$data);
	    $this->display("seatlist");
    }
    //添加座位 add.html
    public function add(){
      if(IS_GET){
          $this->display("add");
      }
      if(IS_POST){
        $Add = M('Seat');
        $Add->create();
        $Add->add();
        $this->success("添加成功");
        // $this->redirect();
      }

    }
    public function updatestatus(){
        $seat = M('Seat');
        $id = I('post.id');
        $data['status'] = I('post.status');
        $seat->where('id='.$id)->save($data);
        $this->success("修改成功");
    }
    //编辑座位
    public function edit(){
        $this->display("edit");
    }
    public function update(){
      $Add = M('Seat');
      $Id = I('post.id');

      $data['bjf'] = I('post.bjf');
      $data['num'] = I('post.num');
      $data['desc'] = I('post.desc');
      $data['seatnum'] = I('post.num');
      $data['pos'] = I('post.pos');
      $Add->where('id='.$Id)->save($data);
      $this->success("修改成功");
    }
    public function delete(){
      $id = I('post.id');
      $Del = M('Seat');
      if(IS_AJAX){
        $Del->where('id='.$id)->delete();
        $Del->save();
        $this->success("删除成功");
      }
    }
}
