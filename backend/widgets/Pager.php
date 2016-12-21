<?php

namespace backend\widgets;

use yii\base\Widget;

/**
 * 分页挂件
 */
class Pager extends Widget {

	/**
	 * 总记录数
	 * @var int
	 */
	public $total = 0;

	/**
	 * 总记录数
	 * @var int
	 */
	public $id = '';

	/**
	 * 默认每页条数
	 * @var int
	 */
	const DEFAULT_ROWS = 10;
	
	public function run() {
		$total = $this->total; // 总记录数
		$page = max(\Yii::$app->request->get('page'), 1); // 当前页码过滤小于1的页数
		$rows = \Yii::$app->request->get('rows', empty($_COOKIE['rows']) ? self::DEFAULT_ROWS : $_COOKIE['rows']); // 每页条数
		setcookie('rows', $rows, 0, '/'); // 缓存每页条数
		$pageCount = ceil($total / $rows); // 总页数
		if ($total <= 0 || $page > $pageCount) { // 记录数目为零，不显示分页
			return '';
		}
		$page = min($page, $pageCount); // 当前页码过滤大于总页数的页数
		$start = ($page - 1) * $rows + 1; // 记录开始条数
		$end_count = $rows; // 当前页数据条数
		if ($page >= $pageCount) { // 最后一页
			$last_page_record_count = $total % $rows; // 最后一页的记录数
			$end_count = $last_page_record_count > 0 ? $last_page_record_count : $rows; // 最后一页的记录条数处理
		}
		$end = $start + $end_count - 1; // 记录结束条数
		$url = \Yii::$app->request->url; // 页面基础URL
		$id = empty($this->id) ? 'pager-' . uniqid() : $this->id; // 分页元素ID
		return <<<TEXT
<div class="row"><div class="col-sm-6"><div class="dataTables_info">当前显示 $start 到 $end 条，共 $total 条记录，每页 <select id="$id-select" onchange="$.page.redirect((new URI(location.hash.substr(1))).setParam({page:1,rows:this.value}).toURL())"><option value="5">5</option><option value="10">10</option><option value="20">20</option></select> 条</div></div><div class="col-sm-6" id="$id"></div></div>
<script>$("#$id-select").val('$rows');$("#$id").myPager({pageCount:$pageCount,current:$page,url:'$url',rows:$rows});</script>
TEXT;
	}

}
