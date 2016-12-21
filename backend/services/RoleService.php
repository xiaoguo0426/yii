<?php

namespace backend\services;

/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/10
 * Time: 15:13
 */

use backend\models\RoleModel;

class RoleService extends AdminService
{

    /**
     * 获得所有角色
     */
    public function getLists()
    {

        $fields = "*";
        $conditions = '';
        $bind_params = '';
        $order_by = 'status DESC,id DESC';  //多个状态排序
        $roleModel = new RoleModel();
        return $roleModel->select_base(false, $fields, $conditions, $bind_params, $order_by);
    }

    /**
     * 根据id获得用户信息
     */
    public function getInfoById($params = [])
    {
        $fields = "id,name,auth,status,create_date";
        $conditions = 'id = :id';
        $bind_params = [':id' => $params['id']];

        $roleModel = new RoleModel();
        $result = $roleModel->find_base($fields, $conditions, $bind_params);
        return $result;
    }

    /**
     * 更新角色信息
     */
    public function updateInfo($post)
    {
        $columns = [
            'name' => $post['name'],
            'auth' => json_encode($post['auth']),
            'status' => $post['status'],
        ];
        $conditions = "id = :id";
        $bind_params = [':id' => $post['id']];

        $userModel = new RoleModel();
        return $userModel->update_base($columns, $conditions, $bind_params);
    }

    /**
     * 添加角色
     */
    public function addRole($post)
    {
        $columns = [
            'name' => $post['name'],
            'auth' => $post['auth'],
            'status' => $post['status'],
            'create_date' => get_now_date()
        ];

        $roleModel = new RoleModel();
        return $roleModel->insert_base($columns);
    }

    /**
     * 获得激活状态的角色
     * @return array
     */
    public function getActiveRoles()
    {
        $fields = "id,name";
        $conditions = 'status = :status';
        $bind_params = ['status' => 1];
        $order_by = 'id DESC';  //多个状态排序
        $roleModel = new RoleModel();
        return $roleModel->select_base(false, $fields, $conditions, $bind_params, $order_by);
    }
}































