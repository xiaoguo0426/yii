<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>角色管理</h5>
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
var html = $.table.render({
	class: "table table-striped table-hover table-bordered",
	rule: "name:角色名,status|showStatus:状态,create_date:创建时间",
	operation: "status|showToggleButton#role,id|showEditButton:编辑#role/edit,id|showDelButton:删除#role/del"
},<?=$list?>);
$('#table').append(html);
</script>