<?php
use Illuminate\Database\Seeder; class OrdersSeeder extends Seeder { private function increaseId() { \App\Order::insert(array('id' => 1000, 'user_id' => 0, 'order_no' => '123456', 'product_id' => \App\Product::first()->id, 'count' => 0, 'email' => '', 'pay_id' => 0, 'status' => \App\Order::STATUS_UNPAY)); try { \App\Order::where('id', 1000)->delete(); } catch (Exception $sp019ea9) { } } public function run() { self::increaseId(); } }