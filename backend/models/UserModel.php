<?php
/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/9
 * Time: 17:34
 */

namespace backend\models;

class UserModel extends AdminModel
{

    public $username;
    public $role_id;
    public $realname;
    public $status;

    public $bind_model = '{{%admin}}';   //绑定模型

    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        return [
            ['username','required','message'=>'账号不能为空！'],
            ['role_id','required','message'=>'角色不能为空！'],
            ['pwd','required','message'=>'密码不能为空！'],
            ['realname','required','message'=>'真实姓名不能为空！'],
            ['status','required','message'=>'状态不能为空！'],
        ];
    }

}





































