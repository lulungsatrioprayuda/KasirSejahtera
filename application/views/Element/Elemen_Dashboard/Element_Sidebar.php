<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">
            <!-- di line 23 ini adalah query menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $query_Menu = "SELECT `user_menu`.`id`, `menu`
                           FROM   `user_menu` JOIN `user_access_menu`
                           ON     `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE  `user_access_menu`.`role_id` = $role_id
                           ORDER BY  `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($query_Menu)->result_array();

            ?>

            <!-- setelah query barulah di looping menu nya -->
            <?php foreach ($menu as $m) : ?>
                <li class="header"><?= $m['menu']; ?></li>

                <!-- Looping sub menu sesuai menu -->
                <?php
                $menuid = $m['id'];
                $querySubMenu = "SELECT *
                                 FROM   `user_sub_menu` JOIN `user_menu`
                                 ON     `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                 WHERE  `user_sub_menu`.`menu_id` = $menuid
                                 AND    `user_sub_menu`.`is_active_menu` = 1";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                foreach ($subMenu as $SM) :
                ?>
                    <?php if ($title == $SM['title_db']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a href="<?= base_url($SM['url']); ?>">
                            <i class="<?= $SM['icon']; ?>"></i> <span><?= $SM['title_db']; ?></span>
                        </a>
                        </li>
                    <?php endforeach; ?>
                    <!-- Akhir looping sub menu -->
                <?php endforeach; ?>
                <!-- batas akhir looping menu -->

                <li class="header">Option</li>


                <li>
                    <a href="<?= base_url('Auth/Logout'); ?>">
                        <i class="fa fa-sign-out"></i> <span>Logout</span>
                    </a>
                </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>