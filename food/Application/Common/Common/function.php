<?php


    /**
     * 数据签名认证
     * @param  array  $data 被认证的数据
     * @return string       签名
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    function data_auth_sign($data) {
        //数据类型检测
        if(!is_array($data)){
            $data = (array)$data;
        }
        ksort($data); //排序
        $code = http_build_query($data); //url编码并生成query字符串
        $sign = sha1($code); //生成签名
        return $sign;
    }

    /**
     * 检测验证码
     * @param  integer $id 验证码ID
     * @return boolean     检测结果
    */
    function check_verify($code, $id = 1){
        $verify = new \Think\Verify();
        $verify->reset = false; //取消验证一次后重置，ajax 验证需要
        return $verify->check($code, $id);
    }

         /**
         * 生成上传文件的文件名;
         * @param  array  $data 被认证的数据
         * @return string
         * @author liuxiaolin(kylinlxl@126.com)
         */
    function create_upload_filename() {
        $sign = sha1(time().mt_rand()); //生成签名
        return $sign;
    }



    /**
     * 处理图片上传方法
     * @author liuxiaolin <kylinlxl@126.com>
     * @return bool
     */
     function upload($file) {
        $upload = new \Think\Upload(C('PIC_UPLOAD'));
        $upload->maxSize = 2*1024*1024;                        // 设置附件上传大小,不大于2M
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');    // 设置附件上传类型
        $upload->savePath = './Public/Static/images/';                        //设置附件上传目录
        $upload->saveName = 'create_upload_filename';          // 采用命名方式
        $info = $upload->uploadOne($file);
        if(!$info){
            E($upload->getError());
        } else {

            return $info;

        }
    }

    /**
     * @Author: 段涛
     * @生成委缩图方法
     * @function name makeThumb
     * @param $picturePath @图片路径
     * @param $ext @图片后缀
     */
    function makeThumb($picturePath,$ext) {
        $thumbList = array( //生成畏缩图尺寸,可生成多尺寸
            'a' => array(170, 110), //列表页畏缩图尺寸
            'b' => array(300, 223), //详情页畏缩图尺寸
        );
        if(!empty($thumbList)) {
            $info = new \Think\Image();
            $path = $picturePath;
            $filePath = $path;
            //居中裁剪
            foreach($thumbList as $thumbName => $thumbSize) {
                if(!$thumbName || empty($thumbSize)) continue;
                $info->open($filePath);
                $info->thumb($thumbSize[0], $thumbSize[1],$info::IMAGE_THUMB_CENTER)->save($path.'_'.$thumbName.'.'.$ext);
            }
        }
    }

    /**
     * @Author: 段涛
     * @ 生成畏缩图地址
     * @function name showThumb
     * @param $url
     * @param $a
     * @return string
     */
    function showThumb($url,$a){
        $arr=explode('.',$url);
        return $arr[0].$arr[1].'.'.$arr[2].'_'.$a.'.'.$arr[2];
    }


    /**
     * 截取UTF8编码字符串从首字节开始指定宽度(非长度), 适用于字符串长度有限的如新闻标题的等宽度截取
     * 中英文混排情况较理想. 全中文与全英文截取后对比显示宽度差异最大,且截取宽度远大越明显.
     * @param string $str   UTF-8 encoding
     * @param int[option] $width 截取宽度
     * @param string[option] $end 被截取后追加的尾字符
     * @param float[option] $x3<p>
     *  3字节（中文）字符相当于希腊字母宽度的系数coefficient（小数）
     *  中文通常固定用宋体,根据ascii字符字体宽度设定,不同浏览器可能会有不同显示效果
     *
     * @return string
     * @author gongfei
     */
    function u8_title_substr($str, $width = 0, $end = '...', $x3 = 0) {
        global $CFG; // 全局变量保存 x3 的值
        if ($width <= 0 || $width >= strlen($str)) {
            return $str;
        }
        $arr = str_split($str);
        $len = count($arr);
        $w = 0;
        $width *= 10;

        $e = '';
        // 不同字节编码字符宽度系数
        $x1 = 11;   // ASCII
        $x2 = 16;
        $x3 = $x3===0 ? ( $CFG['cf3']  > 0 ? $CFG['cf3']*10 : $x3 = 21 ) : $x3*10;
        $x4 = $x3;

        for ($i = 0; $i < $len; $i++) {
            if ($w >= $width) {
                $e = $end;
                break;
            }
            $c = ord($arr[$i]);
            if ($c <= 127) {
                $w += $x1;
            }
            elseif ($c >= 192 && $c <= 223) { // 2字节头
                $w += $x2;
                $i += 1;
            }
            elseif ($c >= 224 && $c <= 239) { // 3字节头
                $w += $x3;
                $i += 2;
            }
            elseif ($c >= 240 && $c <= 247) { // 4字节头
                $w += $x4;
                $i += 3;
            }
        }

        return implode('', array_slice($arr, 0, $i) ). $e;
    }
