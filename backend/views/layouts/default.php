<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>代理系统 - 管理后台</title>
    <link href="<?php echo css_url('bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo assets_url('font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?php echo css_url('animate.css')?>" rel="stylesheet">
    <link href="<?php echo css_url('style.min.css')?>" rel="stylesheet">
    <script>window.bbm_token='<?= Yii::$app->request->csrfToken ?>';</script>
</head>
<?= $content ?>
</html>
