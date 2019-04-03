<?php
namespace App\Http\Controllers\Shop; use Carbon\Carbon; use Illuminate\Database\Eloquent\Relations\Relation; use Illuminate\Http\Request; use App\Http\Controllers\Controller; use App\Library\Response; use App\Library\Geetest; use Illuminate\Support\Facades\Cookie; class Order extends Controller { function get(Request $spf631e6) { if ((int) \App\System::_get('vcode_shop_search') === 1) { $sp567373 = Geetest\API::verify($spf631e6->post('geetest_challenge'), $spf631e6->post('geetest_validate'), $spf631e6->post('geetest_seccode')); if (!$sp567373) { return Response::fail('系统无法接受您的验证结果，请刷新页面后重试。'); } } $spe8afa9 = \App\Order::where('created_at', '>=', (new Carbon())->addDay(-30)); $sp4c5fa8 = $spf631e6->post('type', ''); if ($sp4c5fa8 === 'cookie') { $sp190603 = Cookie::get('customer'); if (strlen($sp190603) !== 32) { return Response::success(); } $spe8afa9->where('customer', $sp190603); } elseif ($sp4c5fa8 === 'order_no') { $sp2346a9 = $spf631e6->post('order_no', ''); if (strlen($sp2346a9) !== 19) { return Response::success(); } $spe8afa9->where('order_no', $sp2346a9); } elseif ($sp4c5fa8 === 'email') { $spe366e9 = $spf631e6->post('email', ''); if (strlen($spe366e9) < 6) { return Response::success(); } $spe8afa9->where('email', $spe366e9); } else { return Response::fail('请选择查询类型'); } $sp3562f5 = $spe8afa9->with(array('card_orders.card' => function (Relation $spe8afa9) { $spe8afa9->select(array('id', 'card')); }))->orderBy('id', 'DESC')->get(array('id', 'created_at', 'order_no', 'email', 'status', 'count', 'paid')); $sp8b04e3 = ''; return Response::success(array('list' => $sp3562f5, 'msg' => count($sp3562f5) ? $sp8b04e3 : '')); } }