<?php
/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/9
 * Time: 17:34
 */

namespace backend\models;

use common\models\CommonModel;

class IndexModel extends CommonModel
{

    public $name;
    public $password;

    public $bind_model = '{{%admin}}';   //绑定模型

    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        return [
            ['name','required','message'=>'用户名不能为空！'],
            ['password','required','message'=>'密码不能为空！'],
        ];
    }

}





































