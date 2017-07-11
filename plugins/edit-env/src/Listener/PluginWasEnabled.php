<?php
use App\Services\FileUtil;

Admin::add_menu('编辑env文件', 'system/env/index',7);
$file = new FileUtil();
$file->copyDir(plugin_address('edit-env/asset'),'vendor/plugins/edit-env',true);
