<?php
/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/11
 * Time: 15:58
 */

namespace backend\controllers;

use backend\services\RoleService;
use backend\models\RoleModel;

/**
 * 角色管理
 * Class RoleController
 * @package backend\controllers
 */
class RoleController extends AdminController
{
    public static $title = '角色管理';
    public static $access_menu = ['index' => '首页', 'add' => '添加', 'del' => '删除', 'search' => '搜索', 'export' => '导出', 'get' => '获取', 'post' => '提交',];

    public function init()
    {
        if (!isLogind()) {
            $this->warning('当前登录已失效，请重新登录！', \yii\helpers\Url::to('index/login'));
        }
    }

    /**
     * 角色管理
     * @return string
     */
    public function actionIndex()
    {
        $roleService = new RoleService();
        $result = $roleService->getLists();

        return $this->render('index', ['list' => json_encode($result)]);
    }

    /**
     * 表单过滤
     */
    public function formFilter(&$post)
    {
        $roleModel = new RoleModel();
        $roleModel->attributes = $post;

        if (!$roleModel->validate()) {
            $this->errorOld($roleModel->getFirstErrorMessage());
        }
        empty($post['auth']) && $post['auth'] = [];
    }

    /**
     * 新增前置操作
     * @param $vo
     */
    public function beforeAdd(&$vo)
    {
    }

    /**
     * 新增后置操作
     * @param $post
     */
    public function afterAdd(&$post)
    {
        $roleService = new RoleService();
        //add
        return $roleService->addRole($post);
    }

    /**
     * 新增成功后置操作
     * @param $post
     */
    public function afterAddSuccess(&$post)
    {

    }

    /**
     * 新增失败后置操作
     * @param $post
     */
    public function afterAddError(&$post)
    {

    }

    /**
     * 编辑前置操作
     * @param $get
     */
    public function beforeEdit(&$get)
    {
        $roleService = new RoleService();
        $result = $roleService->getInfoById(['id' => $get['id']]);
        $get = array_merge($get, $result);
    }

    /**
     * 编辑后置操作
     * @param $post
     */
    public function afterEdit(&$post)
    {
        $roleService = new RoleService();
        //update
        return $roleService->updateInfo($post);
    }

//    public function actionForm()
//    {
//        if ($this->request->isPost) {
//            $post = $this->request->post();
//
//            $roleModel = new RoleModel();
//            $roleModel->attributes = $post;
//
//            if ($roleModel->validate()) {
//
//                $roleService = new RoleService();
//
//                if (empty($post['id'])) {
//                    //add
//                    $result = $roleService->addRole($post);
//                    $result ? $this->success() : $this->error();
//                } else {
//                    //update
//                    $res = $roleService->updateInfo($post);
//                    if ($res) {
//                        $this->success();
//                    } else {
//                        $this->error();
//                    }
//                }
//            } else {
//                $this->errorOld($roleModel->getFirstErrorMessage());
//            }
//
//        } else {
//            $id = $this->request->get('id');
//            if (empty($id)) {
//                return $this->show();
//            } else {
//                $roleService = new RoleService();
//                $result = $roleService->getInfoById($id);
//                return $this->show($result);
//            }
//
//        }
//
//    }

    /**
     *
     */
    public function actionGetActiveRoles()
    {
        if ($this->request->isGet) {
            $roleService = new RoleService();
            $result = $roleService->getActiveRoles();

            $this->ajaxReturn($result);
        }
    }

    public function actionGetAuthList()
    {

        $hostdir = dirname(__FILE__);
        //获取本文件目录的文件夹地址

        $filesnames = scandir($hostdir);

        $access_group = [];
        foreach ($filesnames as $name) {

            if (is_dir($name)) {
                continue;
            }
            $controller = pathinfo($name, PATHINFO_FILENAME);

            $class = new \ReflectionClass(__NAMESPACE__ . '\\' . $controller);

            $access_menu = $class->getStaticPropertyValue('access_menu', []);
            $title = $class->getStaticPropertyValue('title', '');

            $action = lcfirst(substr($controller, 0, -10));//控制器名去掉Controller

            $access_item = ['title' => $title, 'access_menu' => $access_menu];
            $access_group[$action] = $access_item;
        }

        $this->ajaxReturn($access_group);
    }
}