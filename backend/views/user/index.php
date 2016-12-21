<div class="row">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
				<h5>用户管理</h5>
				<div class="ibox-tools">
					<button type="button" class="btn btn-primary btn-sm btn-primary" data-modal="<?=get_url('add')?>" ><i class="fa fa-plus"></i>&nbsp;新增</button>
<!--					<button type="button" class="btn btn-primary btn-sm btn-danger"><i class="fa fa-times"></i>&nbsp;删除</button>-->
				</div>
			</div>
			<div class="ibox-content animated fadeInUp">
				<div class="table-responsive" id="table"></div>
			</div>
		</div>
	</div>
</div>
<?= \backend\widgets\UserJs::widget() ?>
<script>
function show_updatePwd_button(value,row,name,path) {
	return '<button type="button" class="btn btn-sm btn-success" data-modal="'+url.toRoute(path,{id:value})+'"><i class="fa fa-paste"></i> '+name+'</button>';
}
var html = $.table.render({
	class: "table table-striped table-hover table-bordered",
	rule: "username:账号,role:角色,status|showStatus:状态,create_date:创建时间",
	operation: "status|showToggleButton#user,id|showEditButton:编辑#user/edit,id|show_updatePwd_button:修改密码#user/update-pwd,id|showDelButton:删除#user/del"
},<?=json_encode($list)?>);
$('#table').append(html);
</script>