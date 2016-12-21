<?php

namespace backend\widgets;

/**
 * 后端用户相关JS
 */
class UserJs extends \yii\base\Widget {

	public $params = array();

	public function run() {
		$module =  \Yii::$app->controller->module->id;
		$controller = \Yii::$app->controller->id;
		$action = \Yii::$app->controller->action->id;
		return <<<TEXT
<script>
var user={permissions:['admin/agent/index']},module={"name":"$module","controller":"$controller","action":"$action"};
user.checkPermission=function(path){return true||!path||this.permissions.indexOf(path)>-1;};
</script>
TEXT;
	}

}
