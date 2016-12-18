<?php

namespace backend\services;

/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/10
 * Time: 15:13
 */

use backend\models\IndexModel;

class IndexService extends AdminService
{

    public function checkAdmin($params){

        $fields = "id,username,pwd,role_id,status,password_hash,realname";
        $conditions = "username = :name";
        $bind_params = [':name'=>$params['name']];

        $indexModel = new IndexModel();
        $result = $indexModel->find_base($fields,$conditions,$bind_params);
           if ($result['pwd'] === md5($params['password'].$result['password_hash'])){
            return $result;
        }else{
            return false;
        }

    }

}