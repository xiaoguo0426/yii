<?php
namespace backend\controllers;

use backend\models\IndexModel;
use backend\services\IndexService;

class IndexController extends AdminController
{

    public function actionIndex()
    {
        if (is_login()) {
            return $this->render('index', ['info' => session('user')]);
        } else {
            $this->redirect(get_url('login'));
        }
    }

    /**
     * 登陆页
     * @return string
     */
    public function actionLogin()
    {
        if ($this->request->isAjax && $this->request->isPost) {
            $post = $this->request->post();

            $indexModel = new IndexModel();

            $indexModel->attributes = $post;

            if ($indexModel->validate()) {
                $indexService = new IndexService();
                $res = $indexService->checkAdmin($post);
                if ($res) {
                    session('user', $res);       //保存session
                    $this->success('登录成功，正在跳转页面！');
                } else {
                    $this->error('用户名或密码错误！请确认后再试。');
                }
            } else {
                $this->error($indexModel->getFirstErrorMessage());
            }
        } else {
            if (is_login()) {
                $this->redirect(\Yii::$app->homeUrl);
            } else {
                $this->layout = 'default';
                return $this->render('login');
            }
        }
    }

}