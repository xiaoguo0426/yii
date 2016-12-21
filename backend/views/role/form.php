<div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form method="POST" action="<?= \yii\helpers\Url::current() ?>" class="form-horizontal"
                  data-validate data-ajax="true" data-comfirm="true"
                  onSubmit="return false;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">角色信息</h3>
                </div>
                <div class="modal-body" style="">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">角色名</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="<?= empty($name) ? '' : $name; ?>" placeholder="角色名"
                                   class="form-control"
                                   autofocus="true"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">鉴权</label>
                        <div class="col-lg-10">
                            <div class="row" id="auth">

                            </div>
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
                                       value="<?php echo empty($create_date) ? '' : $create_date; ?>"
                                       placeholder="创建时间"
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
        requirejs(['icheck'], function () {
            var load_role = function (auth) {
                $.ajax({
                    type: 'GET',
                    url: "<?=get_url('get-auth-list')?>",
                    async: false,
                    success: function (res) {
                        if (res) {
                            var html = '', body = '', content = '', routing = '', checked = '';
                            for (var i in res) {
                                html = '<div class="form-group">'
                                    + '<label class="col-md-3 col-sm-3 control-label">' + res[i].title + '</label>'
                                    + '<div class="col-md-9 col-sm-9">';
                                if (res[i].access_menu.length === 0) {
                                    continue;
                                }
                                body = '';
                                for (var v in res[i].access_menu) {
                                    routing = i + '\/' + v; //授权路由
                                    checked = (auth && auth.indexOf(routing) !== -1) ? ' checked' : '';

                                    body += '<div class="col-md-3">'
                                        + '<label class="checkbox-inline i-checks"> <input type="checkbox" name="auth[]" value="' + routing + '"' + checked + '>' + res[i].access_menu[v] + '</label>'
                                        + '</div>';
                                }
                                content += html + body + '</div></div>';
                            }
                            $("div#auth").append(content);
                        }
                    }
                });
            };
            load_role(<?php echo empty($auth) ? json_encode([]) : $auth;?>);
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green'
            });
        });
    </script>
</div>
