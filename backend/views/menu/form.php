<div class="modal" data-keyboard='false' data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <form method="POST" action="<?= \yii\helpers\Url::current() ?>" class="form-horizontal"
                  data-validate data-ajax="true" data-comfirm="true"
                  onSubmit="return false;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">菜单信息</h3>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-lg-2 control-label">上级菜单</label>
                        <div class="col-lg-10">
                            <select class="form-control m-b" name="parent_id">
                                <option value="0">主菜单</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">菜单名</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="<?= empty($name) ? '' : $name; ?>" placeholder="菜单名"
                                   class="form-control"
                                   autofocus="true"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">路径</label>
                        <div class="col-lg-10">
                            <input type="text" name="url" value="<?= empty($url) ? '' : $url; ?>"
                                   placeholder="路径  顶级菜单为#" class="form-control"
                                   autofocus="true"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">参数</label>
                        <div class="col-lg-10">
                            <input type="text" name="params" value="<?= empty($params) ? '' : $params; ?>"
                                   placeholder="参数" class="form-control"
                                   autofocus="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">图标</label>
                        <div class="col-lg-10">
                            <input type="hidden" name="icon" value="<?php if (!empty($icon)) {
                                echo $icon;
                            } ?>"/>
                            <button class="btn btn-circle btn-lg" type="button" id="icon">
                                <?php if (!empty($icon)) {
                                    echo '<i class="' . $icon . '"></i>';
                                } ?>
                            </button>
                            <button type="button" class="btn btn-link btn-sm" name="clean-icon">清除图标</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label">排序</label>
                        <div class="col-lg-10">
                            <input type="text" name="sort" value="<?= empty($sort) ? '0' : $sort; ?>" placeholder="排序"
                                   class="form-control"
                                   autofocus="true" required="">
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
            var load_menu = function () {
                $.ajax({
                    type: 'GET',
                    url: "<?=get_url('load-menu')?>",
                    success: function (res) {
                        if (res.length !== 0) {
                            var options = "", selected = "", parent_menu = "<?php echo empty($parent_id) ? 0 : $parent_id; ?>";
                            res.forEach(function (item) {
                                if (parent_menu == item.id) {
                                    selected = "selected";
                                } else {
                                    selected = "";
                                }
                                console.log(item.spl);
                                options += "<option value='" + item.id + "' " + selected + ">" + item.spl + item.name + "</option>";
                            });
                            $("select[name='parent_id']").append(options);
                        }
                    }
                });
            };
            load_menu();

            var $button_icon = $("button#icon"),$input_icon = $("input[name=icon]"),$button_clean = $("button[name=clean-icon]");
            //选择图标
            $button_icon.on('click', function () {
                params = {
                    url: "<?=get_url('icon')?>",
                    method: 'GET',
                };
                $.form.load(params);
            });
            //清除图标
            $button_clean.on('click',function () {
                $button_icon.empty();
                $input_icon.val('');
            });
        });
    </script>
</div>
