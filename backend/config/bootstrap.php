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