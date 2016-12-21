<body class="fixed-sidebar no-skin-config full-height-layout">
<!-- <script src="<?= js_url('plugins/metisMenu/jquery.metisMenu.js'); ?>"></script> -->
<div id="wrapper">
	<?= \backend\widgets\Sidebar::widget(); ?>
	<div id="page-wrapper" class="gray-bg dashbard-1">
		<div class="row border-bottom">
			<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);"><i
							class="fa fa-bars"></i>
					</a>
					<!--<form role="search" class="navbar-form-custom" action="search_results.html">
						<div class="form-group">
							<input type="text" placeholder="搜索" class="form-control"
								   name="top-search" id="top-search">
						</div>
					</form>-->
				</div>
				<ul class="nav navbar-top-links navbar-right">
					<li>
						<a onclick="$.page.reload()" data-tips-text="刷新" class=" topbar-btn topbar-left topbar-info-item text-center" style="width:50px" data-original-title="" title="">
							<span class="glyphicon glyphicon-refresh"></span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" data-logout="<?= get_url('index/logout') ?>">
							<i class="fa fa-sign-out"></i> 退出
						</a>
					</li>
					<li>
						<a class="right-sidebar-toggle">
							<i class="fa fa-tasks"></i>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="fh-no-breadcrumb">
			<div class="wrapper wrapper-content full-height-scroll" id="page-container"></div>
		</div>
        <div class="footer">
            <!--<div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>-->
            <div>
                <strong>Copyright</strong> 公司 &copy; 2014-2016
            </div>
        </div>
	</div>
</div>
<script data-main="<?= js_url('app.js'); ?>" src="<?php echo js_url('require.js'); ?>"></script>
<script src="<?= js_url('config.js'); ?>"></script>
</body>