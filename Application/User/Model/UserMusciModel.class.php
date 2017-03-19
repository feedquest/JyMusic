<?php
// +----------------------------------------------------------------------
// | Author: 战神~~巴蒂
// +----------------------------------------------------------------------

namespace User\Model;
use Think\Model;


class UserMusciModel extends Model {
	protected $_map = array(         
  
	);
	
    /*protected $_validate = array(
        array('name', 'require', '名称不能为空', self::MUST_VALIDATE ,'regex', self::MODEL_BOTH),
        array('album_pic', 'require', '图片地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        //array('singer_name', 'require', '所属讲员不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        //array('genre_name', 'require', '所属讲道类型不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );*/

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('uid', UID, self::MODEL_INSERT),
        array('status', '-1', self::MODEL_BOTH),
    );
     protected  function getName () {
     	return get_userName(UID);
    }


}
