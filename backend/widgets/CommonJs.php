<?php

namespace backend\widgets;

/**
 * 后端公用JS
 */
class CommonJs extends \yii\base\Widget {

	public $params = array();

	public function run() {
		$url_suffix = \Yii::$app->urlManager->suffix;
		$web_root = \Yii::getAlias('@web');
		$script_url = \Yii::$app->request->getScriptUrl();
		if (\Yii::$app->urlManager->showScriptName === false) {
			$script_url = substr($script_url, 0, strrpos($script_url, '/'));
		}
		return <<<TEXT
<script>
window.url={webRoot:"$web_root/",appPath:"$script_url/",suffix:"$url_suffix",toRoute:function(path,params){
	var queryString=[],url=this.appPath+path+this.suffix;
	if (typeof params==="object") {
		for(var key in params){
			queryString.push(key+"="+params[key]);
		}
		url+='?'+queryString.join("&");
	}
	return url
}}
</script>
TEXT;
	}

}
