<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

/**
 * session管理函数
 * @param $name
 * @param $value
 */
function session($name = '', $value = '')
{
    $session = Yii::$app->session;

    if ('' === $value) {
        if (strpos($name, '.')) {
            list($name1, $name2) = explode('.', $name);
            $session_tmp = $session->get($name1);
            return isset($session_tmp[$name2]) ? $session_tmp[$name2] : null;
        } else {
            return $session->get($name);
        }
    } elseif (is_null($value)) {
        $session->remove($name);
    } else {
        $session->set($name, $value);
    }
}

/**
 * 获得当前时间【日期格式】
 * @param string $format
 * @return bool|string
 */
function get_now_date($date = '', $format = 'Y-m-d H:i:s') {

    $func_num_args = func_num_args();
    if ($func_num_args === 1) {
        if (empty($date)) {
            return '';
        }
        $format = 'Y-m-d H:i:s';
        return date($format, $date);
    } elseif ($func_num_args === 2) {
        return date($format, $date);
    } elseif ($func_num_args === 0) {
        return date('Y-m-d H:i:s');
    }
    return '';
}

/**
 * 生成url
 * @param string $url
 * @param bool $scheme
 * @return string
 */
function get_url($url = '', $scheme = false) {
    return ($url == '' ? \yii\helpers\Url::current() : \yii\helpers\Url::toRoute($url, $scheme));
}