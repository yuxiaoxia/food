<?php
namespace Admin\Controller;
// 本类由系统自动生成，仅供测试用途
class TipsController extends CommonController {
    public function index(){
      $tips = M('Tips');
      $data = $tips->select();
      $this->assign('data',$data);
      $this->display();
    }
    public function delete(){
      $id = I('post.id');
      $Tips = M('Tips');
      if(IS_AJAX){
        $Tips->where('id='.$id)->delete();
        $Tips->save();
        $this->success("删除成功");
      }
    }
    public function update(){
      // $id = I('post.id');
      // $con = I('post.con');
      $data['id'] = I('post.id');
      $data['con'] = I('post.con');
      $Tips = M('Tips');
      if(IS_AJAX){
        $Tips->save($data);
        $this->success("修改成功");
      }
    }
    public function add(){
      $data['id'] = "";
      $data['con'] = I('post.con');
      $Tips = M('Tips');
      if(IS_AJAX){
        $Tips->add($data);
        $this->success("添加成功");
      }
    }

    public function status(){
      $data['id'] = I('post.id');
      $data['status'] = I('post.status');
      $Tips = M('Tips');
      if(IS_AJAX){
        $Tips->save($data);
        $this->success("修改成功");
      }
    }
}
