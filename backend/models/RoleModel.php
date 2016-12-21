<?php
/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/9
 * Time: 17:34
 */

namespace backend\models;

class RoleModel extends AdminModel
{

    public $name;
//    public $auth;
    public $status;

    public $bind_model = '{{%role}}';   //绑定模型

    /**
     * 验证规则
     * @return array
     */
    public function rules()
    {
        return [
            ['name','required','message'=>'角色名不能为空！'],
//            ['auth','required','message'=>'鉴权不能为空！'],
            ['status','required','message'=>'状态不能为空！'],
        ];
    }

}





































