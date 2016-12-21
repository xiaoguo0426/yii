<div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form method="POST" action="<?= get_url(Yii::$app->getUrlManager()->baseUrl) ?>" class="form-horizontal"
                  data-validate data-ajax="true" data-comfirm="true"
                  onSubmit="return false;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">修改密码</h3>
                </div>
                <div class="modal-body" style="">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">账号</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" value="<?php echo empty($username) ? '' : $username; ?>"
                                   placeholder="账号" class="form-control" autofocus="true" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">真实姓名</label>
                        <div class="col-lg-10">
                            <input type="text" name="realname" value="<?php echo empty($realname) ? '' : $realname; ?>"
                                   placeholder="真实姓名" class="form-control" autofocus="true" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">密码</label>
                        <div class="col-lg-10">
                            <input type="text" name="pwd" value="<?php echo empty($pwd) ? '' : $pwd; ?>"
                                   placeholder="密码" class="form-control" autofocus="true" pattern="^[A-Za-z0-9]{6,20}$" title="请输入正确的密码"
                                   required="">
                            <span class="help-block m-b-none">密码由长度为6-20位的字母或数字组成</span>
                        </div>
                    </div>

                    <input type="hidden" name="id" value="<?php echo empty($id) ? 0 : $id; ?>"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关&nbsp;闭</button>
                    <button type="submit" class="btn btn-primary">保&nbsp;存</button>
                </div>
            </form>
        </div>
    </div>
    <!-- JS/CSS请放到这里 -->
    <script>
        $(function () {

            var load_role = function (obj, val) {
                //下拉菜单对象    用户保存的角色值
                var param = {
                    'url': '<?=get_url("role/get-active-roles")?>',
                    'method': 'GET',
                    'async': false       //关闭异步
                }, roles = $.form.load(param), selected = '', options = '';
                roles.forEach(function (item) {
                    selected = (val == item.id ? 'selected' : '');
                    options += "<option value='" + item.id + "'" + selected + ">" + item.name + "</option>";
                });
                obj.append(options);

            }, $_select_obj = $("select[name='role_id']");
            load_role($_select_obj,'<?php echo empty($role_id) ? "" : $role_id; ?>');
        });
    </script>
</div>
