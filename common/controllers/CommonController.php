<?php
namespace common\controllers;

use Yii;
use yii\web\Controller;

Class CommonController extends Controller{

	public $request;
	public $response;

	public function __construct($id, $module, $config = []) {
		parent::__construct($id, $module, $config);
		$this->request = Yii::$app->request;
		$this->response = Yii::$app->response;
	}


	/**
	 * 成功响应 --异步
	 * 1.如果只有一个参数。$data必须是string类型，即返回的提示语
	 * @param $data
	 * @param string $info
	 * @param string $format
	 * @return mixed
	 */
	protected function success($data = '', $info = '操作成功！', $format = 'json') {
		$func_num_args = func_num_args();
		if ($func_num_args === 1) {
			if (is_array($data)) {
				$info = '操作成功！';
			} elseif (is_string($data)) {
				$info = $data;
				$data = [];
				$data['status'] = 1;
				$data['info'] = $info;
			}
		} else if ($func_num_args === 2) {
			$data['status'] = 1;
			$data['info'] = $info;
		} else if ($func_num_args === 0) {
			$data['status'] = 1;
			$data['info'] = '操作成功！';
			$format = 'json';
		}

		return $this->ajaxReturn($data, $format);
	}

	/**
	 * 失败响应 --异步
	 * 1.如果只有一个参数。$data必须是string类型，即返回的提示语
	 * @param $data
	 * @param string $info
	 * @param string $format
	 * @return mixed
	 */
	protected function error($data = '', $info = '操作失败！', $format = 'json') {
		$func_num_args = func_num_args();

		if ($func_num_args === 1) {
			$info = $data;
			$data = [];
			$data['status'] = 0;
			$data['info'] = $info;
		} else if ($func_num_args === 2) {
			$data['status'] = 0;
			$data['info'] = $info;
		} else if ($func_num_args === 0) {
			$data['status'] = 0;
			$data['info'] = '操作失败！';
			$format = 'json';
		}
		return $this->ajaxReturn($data, $format);
	}

	/**
	 * 返回响应
	 * @param $data
	 * @param string $format
	 * @return mixed
	 */
	public function ajaxReturn($data, $format = 'json') {
		switch (strtolower($format)) {
			case 'raw':
				Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
				break;
			case 'json':
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
				break;
			case 'html':
				Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
				break;
			case 'jsonp':
				Yii::$app->response->format = \yii\web\Response::FORMAT_JSONP;
				break;
			case 'xml':
				Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
				break;
		}
		Yii::$app->response->data = $data;
		//send()方法调用后，不能追加其他功能
		Yii::$app->response->send();
		exit;
	}
}