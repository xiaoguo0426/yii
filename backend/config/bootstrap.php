<?php
/**
 * 判断是否登录 【后台】
 * @return bool
 */
function is_login()
{
    $session = session('user');
    return empty($session) ? false : true;
}

/**
 * 资源文件路径
 */
function assets_url($assets) {
    return \Yii::getAlias('@web') . '/assets/' . $assets;
}

/**
 * css资源文件路径
 */
function css_url($css) {
    return assets_url('css/' . $css);
}

/**
 * js资源文件路径
 */
function js_url($js) {
    return assets_url('js/' . $js);
}

/**
 * img资源文件路径
 */
function img_url($img) {
    return assets_url('images/' . $img);
}

/**
 * 生成数组树
 * @param $items
 * @param string $id
 * @param string $pid
 * @param string $son
 * @return array
 */
function getArrayTree($items, $id = 'id', $pid = 'parent_id', $son = 'sub')
{
    $tree = array(); //格式化的树
    $tmpMap = array();  //临时扁平数据

    foreach ($items as $item) {
        $tmpMap[$item[$id]] = $item;
    }

    foreach ($items as $item) {
        if (isset($tmpMap[$item[$pid]])) {
            $tmpMap[$item[$pid]][$son][] = &$tmpMap[$item[$id]];
        } else {
            $tree[] = &$tmpMap[$item[$id]];
        }
    }
    return $tree;
}

/**
 * 一维数据数组生成数据树
 * @param type $list 数据列表
 * @param type $id ID Key
 * @param type $pid 父ID Key
 * @param type $path
 * @return type
 */
function getSelectTree($list, $id = 'id', $pid = 'parent_id', $path = 'level', $ppath = '')
{
    $_array_tree = getArrayTree($list);
    $tree = array(); //格式化的树
    foreach ($_array_tree as $_tree) {
        $_tree[$path] = $ppath . '-' . $_tree['id'];
        $count = substr_count($ppath, '-');
        $_tree['spl'] = str_repeat("&nbsp;&nbsp;&nbsp;├ ", $count);
        if (!isset($_tree['sub'])) {
            $_tree['sub'] = array();
        }
        $sub = $_tree['sub'];
        unset($_tree['sub']);
        $tree[] = $_tree;
        if (!empty($sub)) :
            $sub_array = getSelectTree($sub, $id, $pid, $path, $_tree[$path]);
            $tree = array_merge($tree, (Array)$sub_array);
        endif;
    }
    return $tree;
}