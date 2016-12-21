<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
					<span>
						<img alt="image" class="img-circle" src="<?= img_url('profile_small.jpg') ?>"/>
					</span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<span class="clear"> <span class="block m-t-xs"> <strong
                                class="font-bold"><?= session('user.realname') ?></strong>
					 </span> <span class="text-muted text-xs block">角色 <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a data-modal="<?= get_url('user/update-pwd').'?id=' . session('user.id') ?>">修改密码</a></li>
                        <!--<li><a href="contacts.html">修改资料</a></li>-->
                        <li class="divider"></li>
                        <li><a href="javascript:;"
                               data-logout="<?= get_url('index/logout') ?>">退出登录</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <?php foreach ($navs as $row) { ?>
                <li>
                    <a href="javascript:;"
                       <?php if (!isset($row['children'])) { ?>data-href="<?= $row['url'] ?>"<?php } ?>>
                        <?php if (!empty($row['icon'])) { ?><i class="<?= $row['icon'] ?>"
                                                               style="min-width: 12px"></i><?php } ?>
                        <span class="nav-label"><?= $row['title'] ?></span>
                        <?php if (isset($row['children'])) { ?><span class="fa arrow"></span><?php } ?>
                    </a>
                    <?php if (isset($row['children'])) { ?>
                        <ul class="nav nav-second-level collapse">
                            <?php foreach ($row['children'] as $sub) { ?>
                                <li>
                                    <a href="javascript:;"
                                       <?php if (!isset($sub['children'])) { ?>data-href="<?= $sub['url'] ?>"<?php } ?>>
                                        <?php if (!empty($sub['icon'])) { ?><i
                                            class="<?= $sub['icon'] ?>"></i><?php } ?>
                                        <?= $sub['title'] ?>
                                        <?php if (isset($sub['children'])) { ?><span class="fa arrow"></span><?php } ?>
                                    </a>
                                    <?php if (isset($sub['children'])) { ?>
                                        <ul class="nav nav-third-level">
                                            <?php foreach ($sub['children'] as $sub_children) { ?>
                                                <li>
                                                    <a href="javascript:;"
                                                       data-href="<?= $sub_children['url'] ?>"><?php if (!empty($sub_children['icon'])) { ?>
                                                            <i
                                                            class="<?= $sub_children['icon'] ?>"></i><?php } ?><?= $sub_children['title'] ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>