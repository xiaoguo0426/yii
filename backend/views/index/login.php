<body class="gray-bg">
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">IN+</h1>
        </div>
        <h3>欢迎来到代理系统后台</h3>
        <form class="m-t" role="form" action="<?= get_url('do-login')?>" method='post' data-validate data-ajax="true" data-comfirm="false"
              data-tips="正在登录..." onSubmit="return false;">
            <div class="form-group">
                <input type="name" class="form-control" name="name" placeholder="用户名" title="请输入用户名" autofocus required />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="密码" pattern="^[A-Za-z0-9]{6,20}$" title="密码为6~16位的字符" required />
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登&nbsp&nbsp陆</button>
        </form>
        <p class="m-t">Power by xiaoguo0426 <small>&copy; 2016</small> </p>
    </div>
</div>

<!-- Mainly scripts -->
<script data-main="<?= js_url('admin-login.js'); ?>" src="<?= js_url('require.js'); ?>"></script>
<script src="<?= js_url('config.js'); ?>"></script>
</body>