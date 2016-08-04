<?php
namespace Admin\Controller;
// 本类由系统自动生成，仅供测试用途
class CaipuController extends CommonController {
    public function index(){

      $fenlei = M('Cat');
      $data = $data1 = $fenlei->where('pid=0')->select();

      $this->assign('data',$data);
      $this->assign('data1',$data1);
	    $this->display();
    }
    function Fenlei(){
      $fenlei = M('Cat');
      $data = $data1 = $fenlei->where('pid=0')->select();
      $this->assign('data',$data);
      $this->assign('data1',$data1);
      $this->display("Fenlei");
    }
    //添加子分类
    public function addzifenlei(){
      $fenlei = M('Cat');

      $fenleiName = I('post.fenleiName');
      $fenleiId = I('post.fenleiId');
      $adddata['name'] = I('post.zifenleiName');
      $adddata['pid'] = $fenleiId;
      $adddata['path'] = '0,'.$fenleiId.',';
      if(IS_AJAX){
        $fenlei->add($adddata);
        $this->success("添加成功");
      }
    }


    public function zifenlei(){
      $fenlei = D('Cat');

      if(IS_GET){

        $data = $fenlei->where('pid!=0 AND ppid=0')->relation(true)->select();
        $this->assign('data',$data);
        $this->display("zifenlei");

      }


    }

    //删除子分类
    public function delzifenlei(){
      $zifenleiId = I('post.id');
      $fenlei = M('Cat');
      if(IS_AJAX){

        $fenlei->where('id='.$zifenleiId)->delete();
        $fenlei->save();

        $fenlei1 = M('Caipu');
        $fenlei1->where('catid='.$zifenleiId)->delete();
        $fenlei1->save();

        $this->success("删除成功");
      }
    }

    //删除菜品
    public function delcaipin(){
      $caipinId = I('post.id');
      $caipin = M('Caipu');
      if(IS_AJAX){

        $caipin->where('id='.$caipinId)->delete();
        $caipin->save();

        $this->success("删除成功");
      }
    }


    public function updatecaipin(){
      $caipu = M('Caipu');
      if( $caipu->create() ){
        $caipu->save();
        $this->success("修改成功");
      }
    }





    //菜品下架

    public function caipinstatus(){

      $Caipu = M('Caipu');
      $Id = I('post.id');

      $data['status'] = I('post.status');

      $Caipu->where('id='.$Id)->save($data);

      $this->success("修改成功");

    }
    //分类下架
    public function status(){

      $Cat = M('Cat');
      $Caipu = M('Caipu');
      $Id =  I('post.id');

      $data['id'] = I('post.id');
      $data['status'] = I('post.status');
      $status['Cstatus'] = I('post.status');

      if(IS_AJAX){
        $Cat->save($data);
        $Caipu->where('catid='.$Id)->save($status);
        $this->success("修改成功");
      }
    }

    //菜谱列表页
    public function caipulb(){
       $Caipu = M('Caipu');
       $Cat = M('Cat');

      //  import("ORG.Util.Page");    //导入分页类

      if(IS_GET){

        if(isset($_GET['page'])&&$_GET['page']){

          $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,cat.name,caipu.sold,caipu.Cstatus')->where('1')->select();

        }else{
          $cp = $Caipu->join("as caipu left join food_cat as cat on cat.id = caipu.catid")->field('caipu.id,caipu.Cname,cat.name,caipu.sold,caipu.Cstatus')->where('1')->select();

        }

        $this->assign('data',$cp);
        $this->display("caipulb");
      }

      if(IS_POST){

      }
    }


    public function addcaipin(){
      if(IS_GET){
        $fenlei = M('Cat');
        $fudata = $fenlei->where('pid=0')->select();
        $this->assign('fudata',$fudata);
        $this->display("addcaipin");
      }

      if(IS_POST){
        //级联选择分类
        if(I('post.Act') == "select"){
          $fenlei = M('Cat');

          $selectId = I('post.selectId');

          $condition['pid'] = $selectId;
          $condition['ppid']  = array('neq',1);

          if( $selectId ){
            $zidata =  $fenlei->where($condition)->select();
            $this->assign('zidata',$zidata);
            // echo $zidata;
            echo json_encode( $zidata );
          }
        }
        //添加菜品
        if(I('post.Act') == "Add"){

          $AddCat = M('Cat');

          $AddCaipu = M('Caipu');

          $where['name'] = I('post.zifenlei');


          $catid = $AddCat->where($where)->getField('id'); //获取分类id

          $pid = $AddCat->where($where)->getField('pid'); //获取分类id
          $Cname = I('post.name');


          $newPrice = I('post.newprice');
          $title = I('post.title');


          if( $Cname && $newPrice && $title ){

            $dataDetail['catid'] = $catid;
            $dataDetail['pid'] = $pid;
            $dataDetail['Cname'] =  $Cname;
            $dataDetail['title'] = $title;
            $dataDetail['newprice'] = $newPrice;

            $dataDetail['kouwei'] = I('post.kouwei');
            $dataDetail['zhuliao'] = I('post.zhuliao');
            $dataDetail['prtime'] = I('post.prtime');
            $dataDetail['desc'] = I('post.desc');
            $dataDetail['gongxiao'] = I('post.gongxiao');


            $dataDetail['simg'] = I('post.simg');
            $dataDetail['bimg'] = I('post.bimg');

            $AddCaipu->add($dataDetail);

            $this->success("添加成功");

          }
          else{
            $this->error("添加失败");
          }


        }

      }
    }

    public function uploadpic(){
        $picfile = $_POST['picfile'];

        $upload = new \Think\Upload();
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public';   // 设置附件上传根目录
        $upload->savePath  =     '/Static/images/food/'; // 设置附件上传（子）目录
        $upload->saveName  = time().'_'.mt_rand();
        $upload-> autoSub  =  false;
        // 上传文件
        $info  =  $upload->upload();
        if(!$info) {// 上传错误提示错误信息
          $this->error($upload->getError());
        }else{// 上传成功

          $src = $info['picfile']['savepath'].$info['picfile']['savename'];
          if( $_POST['addpic1'] == "上传"){
              die("<script>window.parent.showpic1('{$src}');</script>");
          }
          if( $_POST['addpic2'] == "上传"){
              die("<script>window.parent.showpic2('{$src}');</script>");
          }

        }
    }
    public function caipindetail(){

      $detail = M('Caipu');
      $where['id'] =  I('post.id');
      $data = $detail->where($where)->select();

      $this->assign('data',$data);

      $this->display('detail');
    }


}
