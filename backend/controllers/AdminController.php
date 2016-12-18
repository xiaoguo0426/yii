<?php
/**
 * Created by PhpStorm.
 * User: xiaoguo0426
 * Date: 2016/11/8
 * Time: 15:38
 */

namespace backend\controllers;

use common\controllers\CommonController;

class AdminController extends CommonController
{
	/**
	 * 关闭默认布局
	 */
	public $layout = 'main';

    public function actionIsLogin(){

        return empty($_SESSION['user']) ? false : true;

    }

    /**
	 * 渲染模板
	 * @param array $data
	 * @param $view
	 */
	public function show($data = '', $view = '') {
		$func_num_args = func_num_args();
		if ($func_num_args === 0) {
			$view = $this->action->id;
			return $this->render($view);
		} elseif ($func_num_args === 1) {
			if (is_array($data)) {
				$view = $this->action->id;
				return $this->render($view, $data);
			} else if (is_string($data)) {
				$view = $data; //模板名为指定的模板
				return $this->render($view);
			} else if (is_null($data)) {
				$view = $this->action->id;
				return $this->render($view);
			}
		} elseif ($func_num_args === 2) {
			return $this->render($view, $data);
		}
	}

	public function actionForm() {
		
	}

	/**
	 * 新增操作
	 */
	public function actionAdd($tpl = 'form') {
		$method = ucfirst($this->action->id);

		if ($this->request->isAjax && $this->request->isPost) {
			$post = $this->request->post();
			//后置过滤操作
			$after_action = 'after' . $method;
			$flag = true;
			if ($this->_callback('formFilter', $post) !== false) {
				$flag = $this->_callback($after_action, $post);
			}

			if ($flag !== false) {
				$after_success_action = 'after' . $method . 'Success';
				($this->_callback($after_success_action, $post) !== false) ? $this->success() : $this->error();
			} elseif ($flag === false) {
				$after_error_action = 'after' . $method . 'Error';

				($this->_callback($after_error_action, $post) !== false) ? $this->success() : $this->error();
			}
		} else {
			$get = $this->request->get();
			//前置过滤操作
			$before_action = 'before' . $method;
			$this->_callback($before_action, $get);
			return $this->show($get, $tpl);
		}
	}

	/**
	 * 编辑操作
	 */
	public function actionEdit($tpl = 'form') {
		$method = ucfirst($this->action->id);

		if ($this->request->isAjax && $this->request->isPost) {
			$post = $this->request->post();
			//后置过滤操作
			$after_action = 'after' . $method;
			$flag = true;
			if ($this->_callback('formFilter', $post) !== false) {
				$flag = $this->_callback($after_action, $post);
			}

			if ($flag !== false) {
				$after_success_action = 'after' . $method . 'Success';
				($this->_callback($after_success_action, $post) !== false) ? $this->success() : $this->error();
			} elseif ($flag === false) {
				$after_error_action = 'after' . $method . 'Error';

				($this->_callback($after_error_action, $post) !== false) ? $this->success() : $this->error();
			}
		} else {
			$get = $this->request->get();
			//前置过滤操作
			$before_action = 'before' . $method;
			$this->_callback($before_action, $get);
			return $this->show($get, $tpl);
		}
	}

	/**
	 * 禁用操作
	 */
	public function actionForbid() {
		if (!$this->request->isPost && !$this->request->isAjax) {
			$this->errorOld('访问错误！');
		}
		$post = $this->request->post();

		$action = ucfirst($this->id);

		$method = ucfirst($this->action->id);

		$class = $this->module->id . '\\models\\' . $action . 'Model';

		$model = new $class();
		$model->startTransaction();

		$before_action = 'before' . $method;

		if ($this->_callback($before_action, $post) === false) {
			$model->rollBackTransaction();
			$this->error();
		}

		$result = call_user_func_array([$model, 'action' . $method], [$post]);

		$after_action = 'after' . $method;

		if ($result && ($this->_callback($after_action, $post) !== false)) {
			$model->commitTransaction();
			$this->success();
		} else {
			$model->rollBackTransaction();
			$this->error();
		}
	}

	/**
	 * 启用操作
	 */
	public function actionResume() {
		if (!$this->request->isPost && !$this->request->isAjax) {
			$this->errorOld('访问错误！');
		}
		$post = $this->request->post();

		$action = ucfirst($this->id);

		$class = $this->module->id . '\\models\\' . $action . 'Model';

		$method = ucfirst($this->action->id);   //resume

		$model = new $class();
		$model->startTransaction();
		$before_flag = true;
		$before_action = 'before' . $method;

		if ($this->_callback($before_action, $post) === false) {
			$model->rollBackTransaction();
			$this->error();
		}

		$result = call_user_func_array([$model, 'action' . $method], [$post]);

		$after_flag = true;
		$after_action = 'after' . $method;

		if ($result && ($this->_callback($after_action, $post) !== false)) {
			$model->commitTransaction();
			$this->success();
		} else {
			$model->rollBackTransaction();
			$this->error();
		}
	}

	/**
	 * 刪除操作
	 */
	public function actionDel() {
		if (!$this->request->isPost && !$this->request->isAjax) {
			$this->errorOld('访问错误！');
		}
		$post = $this->request->post();

		$action = ucfirst($this->id);

		$method = ucfirst($this->action->id);

		$class = $this->module->id . '\\models\\' . $action . 'Model';
		$model = new $class();
		$model->startTransaction();
		$before_flag = true;
		$before_action = 'before' . $method;
		if (method_exists($this, $before_action)) {
			$before_flag = $this->$before_action($post);
		}
		if ($before_flag === false) {
			$model->rollBackTransaction();
			$this->error();
		}

		$result = call_user_func_array([$model, 'action' . $method], [$post]);

		$after_flag = true;
		$after_action = 'after' . $method;
		if (method_exists($this, $after_action)) {
			$after_flag = $this->$after_action($post);
		}

		if ($result && ($after_flag !== false)) {
			$model->commitTransaction();
			$this->success();
		} else {
			$model->rollBackTransaction();
			$this->error();
		}
	}

	/**
	 * 回掉函数
	 * @param $method    回掉方法
	 * @param $params    参数
	 * @return null
	 */
	public function _callback($method, &$params) {
		if (method_exists($this, $method)) {
			return $this->$method($params);
		}
		return null;
	}


}