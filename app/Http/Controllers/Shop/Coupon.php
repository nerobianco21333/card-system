<?php
namespace App\Http\Controllers\Shop; use App\Category; use App\Product; use App\Library\Response; use Carbon\Carbon; use Illuminate\Http\Request; use App\Http\Controllers\Controller; class Coupon extends Controller { function info(Request $spf631e6) { $sp23531a = (int) $spf631e6->post('category_id', -1); $spa20daf = (int) $spf631e6->post('product_id', -1); $spbf61ef = $spf631e6->post('coupon'); if (!$spbf61ef) { return Response::fail('请输入优惠券'); } if ($sp23531a > 0) { $spcf070f = Category::findOrFail($sp23531a); $sp7652a3 = $spcf070f->user_id; } elseif ($spa20daf > 0) { $sp69288e = Product::findOrFail($spa20daf); $sp7652a3 = $sp69288e->user_id; } else { return Response::fail('请先选择分类或商品'); } $spe692ec = \App\Coupon::where('user_id', $sp7652a3)->where('coupon', $spbf61ef)->where('expire_at', '>', Carbon::now())->whereRaw('`count_used`<`count_all`')->get(); foreach ($spe692ec as $spbf61ef) { if ($spbf61ef->category_id === -1 || $spbf61ef->category_id === $sp23531a && ($spbf61ef->product_id === -1 || $spbf61ef->product_id === $spa20daf)) { $spbf61ef->setVisible(array('discount_type', 'discount_val')); return Response::success($spbf61ef); } } return Response::fail('优惠券信息无效'); } }