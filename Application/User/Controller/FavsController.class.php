<?php
// +----------------------------------------------+
// | JYmusic音乐管理系统						  |
// +----------------------------------------------+
// | Copyright (c) 2014-2016[http://www.jyuu.cn]  |
// +----------------------------------------------+
// | Author: 战神~~巴蒂 [378020023@qq.com] 		  |
// +----------------------------------------------+

namespace User\Controller;
class FavsController extends UserController {
    /**
	* 收藏音频
	*/    
    public function index(){
    	$this->meta_title = '我的收藏 - '.C('WEB_SITE_TITLE');
		$this->display();
    }
       
    /**
	* 收藏专辑
	*/    
    public function album(){
    	$this->meta_title = '我的专辑收藏 - '.C('WEB_SITE_TITLE');
		$this->display();
    }
    
    
    /**
	* 收藏讲员
	*/    
    public function artist(){
    	$this->meta_title = '我的讲员收藏 - '.C('WEB_SITE_TITLE');
		$this->display();
    }
}