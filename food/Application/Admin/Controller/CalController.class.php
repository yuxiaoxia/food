<?php
namespace Admin\Controller;
// 本类由系统自动生成，仅供测试用途
class CalController extends CommonController {
    public function index(){

      if(IS_GET){
        $this->display();
      }
      if(IS_POST){
        if(I('post.show') == 'foodstop'){
          $caipu = M('Caipu');
          $data = $caipu->order('sold desc')->limit(10)->getField('Cname,sold');
          $info = json_encode($data);
          echo $info;
        }
        if(I('post.show') == 'foodsfenlei'){

          $caipu = M('Caipu');
          $cat = M('Cat');
          $food = array();
          for( $j=1;$j<5;$j++)
          {
            $sold = $caipu->where('pid='.$j)->sum('sold');
            $food[$j-1] = $sold;
          }
          $info = json_encode($food);
          echo $info;

        }
      }
    }

}
