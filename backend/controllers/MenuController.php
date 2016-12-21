<?php

/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/11
 * Time: 15:58
 */

namespace backend\controllers;

use backend\services\MenuService;
use backend\models\MenuModel;

/**
 * 菜单管理
 * Class RoleController
 * @package backend\controllers
 */
class MenuController extends AdminController {

	protected $_table = 'menu';

	public function init() {
		if (!is_login()) {
			$this->error(['url' => \yii\helpers\Url::home()], '当前登录已失效，请重新登录！');
		}
	}

	/**
	 * 菜单管理
	 * @return string
	 */
	public function actionIndex() {
		$menuService = new MenuService();
		$result = $menuService->getLists();
		return $this->render('index', ['list' => json_encode(getSelectTree($result))]);
	}

	public function formFilter(&$post) {
		$menuModel = new MenuModel();
		$menuModel->attributes = $post;
		if (!$menuModel->validate()) {
			$this->errorOld($menuModel->getFirstErrorMessage());
		}
	}

	/**
	 * 新增后置操作
	 * @param $post
	 */
	public function afterAdd(&$post) {
		$menuService = new MenuService();

		return $menuService->addMenu($post);
	}

	/**
	 * 新增成功后置操作
	 * @param $post
	 */
	public function afterAddSuccess(&$post) {
		$this->_deleteMenuCash();
	}

	/**
	 * 编辑前置操作
	 * @param $get
	 */
	public function beforeEdit(&$get) {
		$menuService = new MenuService();
		$result = $menuService->getInfoById(['id' => $get['id']]);
		$get = array_merge($get, $result);
	}

	/**
	 * 编辑后置操作
	 * @param $post
	 */
	public function afterEdit(&$post) {
		$menuService = new MenuService();
		$menuService->updateInfo($post);
	}

	/**
	 * 编辑成功后置操作
	 * @param $post
	 */
	public function afterEditSuccess(&$post) {
		$this->_deleteMenuCash();
	}

//    public function actionForm()
//    {
//
//        if ($this->request->isAjax && $this->request->isPost) {
//            $post = $this->request->post();
//
//            $menuModel = new MenuModel();
//            $menuModel->attributes = $post;
//
//            if ($menuModel->validate()) {
//                $menuModel->startTransaction();
//                $menuService = new MenuService();
//
//                if (empty($post['id'])) {
//                    $result = $menuService->addMenu($post);
//                    if ($result) {
//                        //清除菜单缓存
//                        $this->_deleteMenuCash();
//                        $menuModel->commitTransaction();
//                        $this->success();
//                    } else {
//                        $menuModel->rollBackTransaction();
//                        $this->error();
//                    }
//                } else {
//                    //update
//                    $res = $menuService->updateInfo($post);
//                    if ($res !== false) {
//                        //清除菜单缓存
//                        $this->_deleteMenuCash();
//                        $menuModel->commitTransaction();
//                        $this->success();
//                    } else {
//                        $menuModel->rollBackTransaction();
//                        $this->error();
//                    }
//                }
//            } else {
//                $this->errorOld($menuModel->getFirstErrorMessage());
//            }
//
//        } else {
//            $id = $this->request->get('id');
//
//            if (empty($id)) {
//                return $this->show();
//            } else {
//                $menuService = new MenuService();
//                $result = $menuService->getInfoById(['id' => $id]);
//                return $this->show($result);
//            }
//
//        }
//    }

	/**
	 * 刪除操作後置操作
	 * @param $post     要删除的数据  id
	 */
	public function afterDel($post) {
		$this->_deleteMenuCash();
		//如果删除的菜单是顶级菜单，把其下的子菜单置为顶级菜单
		$menuService = new MenuService();
		$result = $menuService->resetSubMenu($post);
		return ($result !== false) ? true : false;
	}

	/**
	 * 启用操作后置操作
	 */
	public function afterResume() {
		$this->_deleteMenuCash();
	}

	/**
	 * 禁用操作后置操作
	 */
	public function afterForbid($post) {
		$this->_deleteMenuCash();
		//如果禁用的是主菜單，则把其下的子菜单全部禁用
		$menuService = new MenuService();
		$result = $menuService->forbidSubMenu($post);
		return ($result !== false) ? true : false;
	}

	private function _deleteMenuCash() {
		//清除菜单缓存
		\Yii::$app->cache->delete('menu');
	}

	/**
	 * 加载菜单
	 */
	public function actionLoadMenu() {
		if ($this->request->isAjax && $this->request->isGet) {
			$menuService = new MenuService();
			$menus = $menuService->getTopMenu();

			$select_tree = getSelectTree($menus);
			$this->ajaxReturn($select_tree, 'JSON');
		}
	}

	public function afterOrder(&$sort_list) {
		$this->_deleteMenuCash();
	}

	/**
	 * 图标选择
	 */
	public function actionIcon() {
		return $this->show();
	}

}
