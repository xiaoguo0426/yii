<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>角色管理</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-primary btn-sm btn-primary" data-modal="<?=get_url('add')?>" ><i class="fa fa-plus"></i>&nbsp;新增</button>
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
function show_menu_name(name,vo) {
	return vo.spl+name;
}
var html = $.table.render({
	order: 'sort',
	color:"status|show_color",
	class:"table table-striped table-hover table-bordered",
	rule:"name|show_menu_name:菜单名,status|showStatus:状态,create_date:创建时间",
	operation:"id|showToggleButton#menu,id|showEditButton:编辑#menu/edit,id|showDelButton:删除#menu/del"
},<?=$list?>);
$('#table').append(html);
</script>