<?php

namespace Mobile\Controller;
/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class SearchController extends MobileController {

	//系统首页
    public function index($k=""){
		$k = text_filter($k);
    	if (!empty($k)){
			$map['status']=1;
			$map['name'] = array('like',"%{$k}%");
			//search album
			$list = M('Album')->where($map)->field('id,name,artist_id,type_id,cover_url')->order('name ASC')->limit(100)->select(); 
			if (!empty($list)){
				foreach($list as &$v){
					$v['url']			= U('/album/'.$v['id']);
					$v['artist_url'] 	= U('artist/'.$info['artist_id']);
					$v['genre_url'] 	= !empty($song['genre_id']) ? U('/genre/'.$song['genre_id']) : U('/genre');
					$v['type_url'] 		= U('album/type-'.$info['type_id']);
					$v['cover_url'] 	= !empty($v['cover_url'])?$v['cover_url']:"/Public/static/images/album_cover.png";			
				}
			}
			$this->assign('list_albums',$list);
			//search artists			
	 		$list = M('Artist')->where($map)->field('id,name,cover_url')->order('name ASC')->limit(100)->select(); 
			if (!empty($list)){
				foreach($list as &$v){
					$v['url']			= U('/artist/'.$v['id']);
					$v['cover_url'] 	= !empty($v['cover_url'])?$v['cover_url']:"/Public/static/images/album_cover.png";			
				}
			}
			$this->assign('list_artists',$list);
			//search songs
			$list = M('Songs')->where($map)->field('id,artist_id,album_id,genre_id,name,up_uid,up_uname,listens,add_time')->order('name ASC')->limit(100)->select();
			if (!empty($list)){
				foreach($list as &$v){
					$v['url']		= U('/music/'.$v['id']);						
					$v['artist_url']= U('/artist/'.$v['artist_id']);
					$v['user_url']	= U('/user/'.$v['up_uid']);
					$v['album_url']	= U('/album/'.$v['album_id']);
					$v['genre_url']	= intval($v['genre_id']) > 0? U('/genre/'.$v['genre_id']) : U('/genre');
					$v['down_url']	= U('/down/'.$v['id']);
				}
			}	
			$this->assign('k',$k);
			$this->assign('list_songs',$list);
			$this->display();			
		
		}else{
			$this->error('请填写关键字！');	
		}		       
    }
	
}