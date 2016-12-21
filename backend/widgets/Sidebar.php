<?php

namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Url;

/**
 * 左侧菜单挂件
 */
class Sidebar extends Widget {

	public function run() {
		$data = array();
		$menu_key = 'menu';
		$data['navs'] = \Yii::$app->cache->get($menu_key); // 从缓存读取菜单HTML
		if (empty($data['navs'])) { // 从数据库读取菜单
			$list = \Yii::$app->db->createCommand('SELECT id,parent_id,name AS title,icon,url FROM {{%menu}} WHERE `status` = 1 ORDER BY `sort`,id')->queryAll();
			foreach ($list as &$row) {
				if (!empty($row['url']) && $row['url'] != '#') {
					$row['url'] = Url::toRoute($row['url']);
				}
			}
			$data['navs'] = getArrayTree($list, 'id', 'parent_id', 'children');
			\Yii::$app->cache->set($menu_key, $data['navs']); // 缓存菜单HTML
		}
		return $this->render('//layouts/sidebar', $data);
	}

}
