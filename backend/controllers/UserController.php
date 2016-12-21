<?php

namespace backend\controllers;

use backend\services\UserService;
use backend\models\UserModel;
use yii\base\DynamicModel;

/**
 * 系统用户管理控制器
 * @date 2016-11-09 15:41
 */
class UserController extends AdminController
{

    public function init()
    {
        if (!isLogind()) {
            $this->warning('当前登录已失效，请重新登录！', \yii\helpers\Url::to('index/login'));
        }
    }

//    /**
//     * 用户管理
//     * @return string
//     */
//    public function actionIndex()
//    {
//        $userService = new UserService();
//        $result = $userService->getLists();
//
//        return $this->render('index', ['list' => json_encode($result)]);
//    }
    public function beforeList(&$query)
    {
        $query->select("a.*,r.name role")
            ->leftJoin('{{%role}} r', 'a.role_id = r.id')
            ->orderBy('a.create_date DESC');
    }

    public function formFilter(&$post)
    {

    }

    public function beforeAdd(&$post)
    {
        $userService = new UserService();
        $exist_res = $userService->existAdminUser($post['username']);
        if ($exist_res) {
            $this->errorOld('用户名已经存在！');
            exit();
        }

        $userModel = new UserModel();
        $userModel->attributes = $post;
        if (!$userModel->validate()) {
            $this->errorOld($userModel->getFirstErrorMessage());
        }
    }

    /**
     * 新增后置操作
     * @param $post
     */
    public function afterAdd(&$post)
    {
        $userService = new UserService();

        return $userService->addAdminUser($post);
    }

    public function beforeEdit(&$get)
    {
        $userService = new UserService();
        $result = $userService->getInfoById(['id' => $get['id']]);
        $get = array_merge($get, $result);
    }

    public function afterEdit(&$post)
    {
        $id = $post['id'];
        $realname = $post['realname'];
        $role_id = $post['role_id'];
        $status = $post['status'];

        $dynamicModel = new DynamicModel(compact('id','realname', 'role_id', 'status'));
        //验证字段  验证器  参数
        $dynamicModel->addRule('id', 'required', ['message' => 'id不能为空！'])
            ->addRule('realname', 'required', ['message' => '真实姓名不能为空！'])
            ->addRule('role_id', 'required', ['message' => '角色不能为空！'])
            ->addRule('status', 'required', ['message' => '状态不能为空！']);
        $dynamicModel->load($post);//加载需要验证的数据

        if ($dynamicModel->validate()) {
            $userService = new UserService();
            $result = $userService->updateInfo($post);
            $result !== false ? $this->successOld() : $this->errorOld();
        } else {
            //获得第一条错误
            $this->errorOld(current($dynamicModel->getFirstErrors()));
        }
    }
//    public function actionForm()
//    {
//        if ($this->request->isPost) {
//            $post = $this->request->post();
//            $userService = new UserService();
//            $exist_res = $userService->existAdminUser($post['username']);
//            if ($exist_res) {
//                $this->errorOld('用户名已经存在！');
//                exit();
//            }
//
//            if (empty($post['id'])) {
//                //add
//                //添加和修改的数据不一样，所以必须要这样验证
//                $username = $post['username'];
//                $pwd = $post['pwd'];
//                $role_id = $post['role_id'];
//                $status = $post['status'];
//                $model = new DynamicModel(compact('username', 'pwd', 'role_id', 'status'));
//                //验证字段  验证器  参数
//                $model->addRule('username', 'required', ['message' => '账号不能为空！'])
//                    ->addRule('pwd', 'required', ['message' => '密码不能为空！'])
//                    ->addRule('role_id', 'required', ['message' => '角色不能为空！'])
//                    ->addRule('status', 'required', ['message' => '状态不能为空！']);
//
//                $model->load($post);//加载需要验证的数据
//                if ($model->validate()) {
//                    //validate success
//                    $result = $userService->addAdminUser($post);
//                    $result ? $this->success() : $this->error();
//                } else {
//                    //validate error
//                    //获得第一条错误
//                    $this->errorOld(current($model->getFirstErrors()));
//                }
//
//            } else {
//                //update
//                $userModel = new UserModel();
//
//                $userModel->attributes = $post;
//
//                if ($userModel->validate()) {
//
//                    $res = $userService->updateInfo($post);
//                    if ($res) {
//                        $this->success();
//                    } else {
//                        $this->error();
//                    }
//                } else {
//                    $this->errorOld($userModel->getFirstErrorMessage());
//                }
//            }
//        } else {
//            $id = $this->request->get('id');
//            if (empty($id)) {
//                return $this->show();
//            } else {
//                $userService = new UserService();
//                $result = $userService->getInfoById(['id' => $id]);
//                return $this->show($result);
//            }
//        }
//
//    }

    /**
     * 修改密码
     * @return string
     */
    public function actionUpdatePwd()
    {

        if ($this->request->isAjax && $this->request->isPost) {
            $post = $this->request->post();

            if (!is_str_len($post['pwd'])) {
                $this->errorOld('请输入正确的密码');
            }
            $userService = new UserService();
            $result = $userService->updateAdminPwd($post);

            if ($result !== false) {
                $this->success();
            } else {
                $this->error();
            }
        } else {
            $id = $this->request->get('id');
            $userService = new UserService();
            $result = $userService->getInfoById(['id' => $id]);
            return $this->show($result);
        }

    }
}
