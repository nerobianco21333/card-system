<?php
use Illuminate\Database\Seeder; class SystemSeeder extends Seeder { public function run() { $sp90fbe2 = array('app_name' => '发卡系统', 'app_url' => 'http://www.example.com', 'app_url_api' => 'http://www.example.com', 'keywords' => '在线发卡系统', 'description' => '我是一个发卡系统, 这里填写描述', 'shop_bkg' => 'http://api.izhao.me/img', 'shop_ann' => '欢迎来到XXX小店', 'shop_ann_pop' => '', 'shop_inventory' => 1, 'js_tj' => '<div style="display: none"><script src="https://s22.cnzz.com/z_stat.php?id=1272914459&web_id=1272914459" language="JavaScript"></script></div>', 'js_kf' => '', 'vcode_driver' => 'geetest', 'vcode_login' => '0', 'vcode_shop_buy' => '0', 'vcode_shop_search' => '0', 'storage_driver' => 'local', 'order_clean_unpay_open' => '0', 'order_clean_unpay_day' => '7'); $sp01074d = array(); foreach ($sp90fbe2 as $sp783862 => $spce84f3) { $sp01074d[] = array('name' => $sp783862, 'value' => $spce84f3); } DB::table('systems')->insert($sp01074d); } }