<?php

namespace backend\services;

/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/10
 * Time: 15:13
 */

use backend\models\UserModel;

class UserService extends AdminService
{

    /**
     * 获得后台所有用户
     */
    public function getLists()
    {

        $fields = "*";
        $conditions = '';
        $bind_params = '';
        $order_by = 'status DESC,id DESC';  //多个状态排序
        $userModel = new UserModel();
        return $userModel->select_base(false, $fields, $conditions, $bind_params, $order_by);
    }

    /**
     * 根据id获得用户信息
     */
    public function getInfoById($params = [])
    {
        $fields = "id,username,logo,role_id,status,realname,create_date";
        $conditions = 'id = :id';
        $bind_params = [':id' => $params['id']];

        $userModel = new UserModel();
        return $userModel->find_base($fields, $conditions, $bind_params);
    }

    /**
     * 更新用户信息
     */
    public function updateInfo($post)
    {
//        $password_hash = mt_rand(1000, 9999);

        $columns = [
//            'username' => $post['username'],
            'logo' => $post['logo'],
            'role_id' => $post['role_id'],
            'status' => $post['status'],
            'realname' => $post['realname']
        ];
        $conditions = "id = :id";
        $bind_params = [':id' => $post['id']];

        $userModel = new UserModel();
        return $userModel->update_base($columns, $conditions, $bind_params);
    }

    /**
     * 添加系统用户
     */
    public function addAdminUser($post)
    {
        $password_hash = mt_rand(1000, 9999);

        $columns = [
            'username' => $post['username'],
            'pwd' => md5($post['pwd'] . $password_hash),
            'password_hash' => $password_hash,
            'logo' => $post['logo'],
            'role_id' => $post['role_id'],
            'status' => $post['status'],
            'realname' => $post['realname'],
            'create_date' => get_now_date()
        ];

        $userModel = new UserModel();
        return $userModel->insert_base($columns);
    }

    /**
     * 检测用户名是否存在
     * @param $username
     */
    public function existAdminUser($username)
    {
        $fields = "*";
        $conditions = "username = :username";
        $bind_params = [':username' => $username];

        $userModel = new UserModel();
        return $userModel->find_base($fields, $conditions, $bind_params);

    }

    /**
     * 修改系统用户密码
     */
    public function updateAdminPwd($post){
        $password_hash = mt_rand(1000, 9999);

        $columns = [
            'pwd' => md5($post['pwd'] . $password_hash),
            'password_hash' => $password_hash,
        ];
        $conditions = "id = :id";
        $bind_params = [':id' => $post['id']];

        $userModel = new UserModel();
        return $userModel->update_base($columns, $conditions, $bind_params);
    }

}































