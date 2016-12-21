<?php

namespace backend\services;

/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/10
 * Time: 15:13
 */

use backend\models\MenuModel;

class MenuService extends AdminService
{

    /**
     * 获得所有角色
     */
    public function getLists($fields = '*')
    {
        $conditions = '';
        $bind_params = '';
        $order_by = '`sort`,id';  //多个状态排序
        $menuModel = new MenuModel();
        return $menuModel->select_base(false, $fields, $conditions, $bind_params, $order_by);
    }

    /**
     * 获得顶级菜单
     */
    public function getTopMenu()
    {
        $fields = "id,name,parent_id";
        $conditions = 'parent_id = :parent_id';
        $bind_params = [':parent_id' => 0];
        $order_by = 'sort ASC';  //多个状态排序
        $menuModel = new MenuModel();
        return $menuModel->select_base(false, $fields, $conditions, $bind_params, $order_by);
    }

    /**
     * 根据id获得用户信息
     */
    public function getInfoById($params)
    {
        $fields = "*";
        $conditions = 'id = :id';
        $bind_params = [':id' => $params['id']];

        $menuModel = new MenuModel();
        return $menuModel->find_base($fields, $conditions, $bind_params);
    }

    /**
     * 更新菜单信息
     */
    public function updateInfo($post)
    {

        $columns = [
            'parent_id' => $post['parent_id'],
            'name' => $post['name'],
            'url' => $post['url'],
            'params' => $post['params'],
            'sort' => $post['sort'],
            'status' => $post['status'],
            'icon' => $post['icon']
        ];
        $conditions = "id = :id";
        $bind_params = [':id' => $post['id']];

        $menuModel = new MenuModel();
        return $menuModel->update_base($columns, $conditions, $bind_params);
    }

    /**
     * 添加菜单
     */
    public function addMenu($post)
    {

        $columns = [
            'parent_id' => $post['parent_id'],
            'name' => $post['name'],
            'url' => $post['url'],
            'params' => $post['params'],
            'sort' => $post['sort'],
            'status' => $post['status'],
            'icon'=>$post['icon'],
            'create_date' => get_now_date()
        ];

        $menuModel = new MenuModel();
        return $menuModel->insert_base($columns);
    }

    /**
     * 重置子菜单
     * 当顶级菜单被删除，其子菜单被重置为顶级菜单
     * @param $params
     * @return int
     */
    public function resetSubMenu($params)
    {
        $columns = [
            'parent_id' => 0
        ];
        $conditions = "parent_id = :parent_id";
        $bind_params = [
            ':parent_id' => $params['id']
        ];
        $menuModel = new MenuModel();
        return $menuModel->update_base($columns, $conditions, $bind_params);
    }


    /**
     * 禁用子菜单
     * 当顶级菜单被禁用，其子菜单全部被禁用
     * @param $params
     */
    public function forbidSubMenu($params){
        $columns = [
            'status' => 0
        ];
        $conditions = "parent_id = :parent_id";
        $bind_params = [
            ':parent_id' => $params['id']
        ];
        $menuModel = new MenuModel();
        return $menuModel->update_base($columns, $conditions, $bind_params);
    }

}































