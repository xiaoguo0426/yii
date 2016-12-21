<div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form method="POST" action="<?= \yii\helpers\Url::current() ?>" class="form-horizontal"
                  data-validate data-ajax="true" data-comfirm="true"
                  onSubmit="return false;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">用户信息</h3>
                </div>
                <div class="modal-body" style="">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">账号</label>
                        <div class="col-lg-10">
                            <input type="text" name="username" value="<?php echo empty($username) ? '' : $username; ?>"
                                   placeholder="账号" class="form-control" autofocus="true"
                                   <?php if (empty($username)){?>
                                   pattern="^[A-Za-z0-9]{6,20}$" required=""
                                   <?php }else{ ?>
                                    disabled="disabled"
                                   <?php }?> >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">真实姓名</label>
                        <div class="col-lg-10">
                            <input type="text" name="realname" value="<?php echo empty($realname) ? '' : $realname; ?>"
                                   placeholder="真实姓名" class="form-control"
                                   autofocus="true"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">LOGO</label>
                        <div class="col-lg-10">
                            <input type="text" name="logo" value="<?php echo empty($logo) ? '' : $logo; ?>"
                                   placeholder="LOGO" class="form-control"
                                   autofocus="true"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">角色</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="role_id" required="" title="请选择角色">
                                <option value="">请选择角色</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-lg-2 control-label">状态</label>
                        <div class="col-lg-10">
                            <div class="radio radio-info radio-inline">
                                <input type="radio" value="1" name="status"
                                       <?php if (empty($status) || isset($status) && intval($status) === 1){ ?>checked=""<?php } ?>>
                                启用
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" value="0" name="status"
                                       <?php if (isset($status) && intval($status) === 0){ ?>checked=""<?php } ?>>
                                禁用
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($id)) { ?>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">创建时间</label>
                            <div class="col-lg-10">
                                <input type="text" name="create_date"
                                       value="<?php echo empty($create_date) ? '' : $create_date; ?>" placeholder="创建时间"
                                       class="form-control"
                                       disabled>
                            </div>
                        </div>
                    <?php } ?>
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
