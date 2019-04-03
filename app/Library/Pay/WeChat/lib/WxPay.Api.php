<?php
require_once 'WxPay.Exception.php'; require_once 'WxPay.Config.php'; require_once 'WxPay.Data.php'; class WxPayApi { public static function unifiedOrder($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/unifiedorder'; if (!$spcb3a82->IsOut_trade_noSet()) { throw new WxPayException('缺少统一支付接口必填参数out_trade_no！'); } else { if (!$spcb3a82->IsBodySet()) { throw new WxPayException('缺少统一支付接口必填参数body！'); } else { if (!$spcb3a82->IsTotal_feeSet()) { throw new WxPayException('缺少统一支付接口必填参数total_fee！'); } else { if (!$spcb3a82->IsTrade_typeSet()) { throw new WxPayException('缺少统一支付接口必填参数trade_type！'); } } } } if ($spcb3a82->GetTrade_type() == 'JSAPI' && !$spcb3a82->IsOpenidSet()) { throw new WxPayException('统一支付接口中，缺少必填参数openid！trade_type为JSAPI时，openid为必填参数！'); } if ($spcb3a82->GetTrade_type() == 'NATIVE' && !$spcb3a82->IsProduct_idSet()) { throw new WxPayException('统一支付接口中，缺少必填参数product_id！trade_type为JSAPI时，product_id为必填参数！'); } if (!$spcb3a82->IsNotify_urlSet()) { $spcb3a82->SetNotify_url(WxPayConfig::NOTIFY_URL); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function orderQuery($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/orderquery'; if (!$spcb3a82->IsOut_trade_noSet() && !$spcb3a82->IsTransaction_idSet()) { throw new WxPayException('订单查询接口中，out_trade_no、transaction_id至少填一个！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function closeOrder($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/closeorder'; if (!$spcb3a82->IsOut_trade_noSet()) { throw new WxPayException('订单查询接口中，out_trade_no必填！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function refund($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/secapi/pay/refund'; if (!$spcb3a82->IsOut_trade_noSet() && !$spcb3a82->IsTransaction_idSet()) { throw new WxPayException('退款申请接口中，out_trade_no、transaction_id至少填一个！'); } else { if (!$spcb3a82->IsOut_refund_noSet()) { throw new WxPayException('退款申请接口中，缺少必填参数out_refund_no！'); } else { if (!$spcb3a82->IsTotal_feeSet()) { throw new WxPayException('退款申请接口中，缺少必填参数total_fee！'); } else { if (!$spcb3a82->IsRefund_feeSet()) { throw new WxPayException('退款申请接口中，缺少必填参数refund_fee！'); } else { if (!$spcb3a82->IsOp_user_idSet()) { throw new WxPayException('退款申请接口中，缺少必填参数op_user_id！'); } } } } } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, true, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function refundQuery($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/refundquery'; if (!$spcb3a82->IsOut_refund_noSet() && !$spcb3a82->IsOut_trade_noSet() && !$spcb3a82->IsTransaction_idSet() && !$spcb3a82->IsRefund_idSet()) { throw new WxPayException('退款查询接口中，out_refund_no、out_trade_no、transaction_id、refund_id四个参数必填一个！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function downloadBill($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/downloadbill'; if (!$spcb3a82->IsBill_dateSet()) { throw new WxPayException('对账单接口中，缺少必填参数bill_date！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); if (substr($spd6e0e5, 0, 5) == '<xml>') { return ''; } return $spd6e0e5; } public static function micropay($spcb3a82, $sp35336e = 10) { $sp81923e = 'https://api.mch.weixin.qq.com/pay/micropay'; if (!$spcb3a82->IsBodySet()) { throw new WxPayException('提交被扫支付API接口中，缺少必填参数body！'); } else { if (!$spcb3a82->IsOut_trade_noSet()) { throw new WxPayException('提交被扫支付API接口中，缺少必填参数out_trade_no！'); } else { if (!$spcb3a82->IsTotal_feeSet()) { throw new WxPayException('提交被扫支付API接口中，缺少必填参数total_fee！'); } else { if (!$spcb3a82->IsAuth_codeSet()) { throw new WxPayException('提交被扫支付API接口中，缺少必填参数auth_code！'); } } } } $spcb3a82->SetSpbill_create_ip($_SERVER['REMOTE_ADDR']); $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function reverse($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/secapi/pay/reverse'; if (!$spcb3a82->IsOut_trade_noSet() && !$spcb3a82->IsTransaction_idSet()) { throw new WxPayException('撤销订单API接口中，参数out_trade_no和transaction_id必须填写一个！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, true, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function report($spcb3a82, $sp35336e = 1) { $sp81923e = 'https://api.mch.weixin.qq.com/payitil/report'; if (!$spcb3a82->IsInterface_urlSet()) { throw new WxPayException('接口URL，缺少必填参数interface_url！'); } if (!$spcb3a82->IsReturn_codeSet()) { throw new WxPayException('返回状态码，缺少必填参数return_code！'); } if (!$spcb3a82->IsResult_codeSet()) { throw new WxPayException('业务结果，缺少必填参数result_code！'); } if (!$spcb3a82->IsUser_ipSet()) { throw new WxPayException('访问接口IP，缺少必填参数user_ip！'); } if (!$spcb3a82->IsExecute_time_Set()) { throw new WxPayException('接口耗时，缺少必填参数execute_time_！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetUser_ip($_SERVER['REMOTE_ADDR']); $spcb3a82->SetTime(date('YmdHis')); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); return $spd6e0e5; } public static function bizpayurl($spcb3a82, $sp35336e = 6) { if (!$spcb3a82->IsProduct_idSet()) { throw new WxPayException('生成二维码，缺少必填参数product_id！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetTime_stamp(time()); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); return $spcb3a82->GetValues(); } public static function shorturl($spcb3a82, $sp35336e = 6) { $sp81923e = 'https://api.mch.weixin.qq.com/tools/shorturl'; if (!$spcb3a82->IsLong_urlSet()) { throw new WxPayException('需要转换的URL，签名用原串，传输需URL encode！'); } $spcb3a82->SetAppid(WxPayConfig::APPID); $spcb3a82->SetMch_id(WxPayConfig::MCHID); $spcb3a82->SetNonce_str(self::getNonceStr()); $spcb3a82->SetSign(); $sp60a70a = $spcb3a82->ToXml(); $spd4225b = self::getMillisecond(); $spd6e0e5 = self::postXmlCurl($sp60a70a, $sp81923e, false, $sp35336e); $spe62cd8 = WxPayResults::Init($spd6e0e5); self::reportCostTime($sp81923e, $spd4225b, $spe62cd8); return $spe62cd8; } public static function notify($sp7230c5, &$spb18c75) { $sp60a70a = file_get_contents('php://input'); try { $spe62cd8 = WxPayResults::Init($sp60a70a); } catch (WxPayException $sp019ea9) { $spb18c75 = $sp019ea9->errorMessage(); return false; } return call_user_func($sp7230c5, $spe62cd8); } public static function getNonceStr($sp047f5a = 32) { $sp7e2a56 = 'abcdefghijklmnopqrstuvwxyz0123456789'; $sp4e169a = ''; for ($sp218d20 = 0; $sp218d20 < $sp047f5a; $sp218d20++) { $sp4e169a .= substr($sp7e2a56, mt_rand(0, strlen($sp7e2a56) - 1), 1); } return $sp4e169a; } public static function replyNotify($sp60a70a) { echo $sp60a70a; } private static function reportCostTime($sp81923e, $spd4225b, $spbda5b4) { if (WxPayConfig::REPORT_LEVENL == 0) { return; } if (WxPayConfig::REPORT_LEVENL == 1 && array_key_exists('return_code', $spbda5b4) && $spbda5b4['return_code'] == 'SUCCESS' && array_key_exists('result_code', $spbda5b4) && $spbda5b4['result_code'] == 'SUCCESS') { return; } $sp2e68ea = self::getMillisecond(); $sp98e542 = new WxPayReport(); $sp98e542->SetInterface_url($sp81923e); $sp98e542->SetExecute_time_($sp2e68ea - $spd4225b); if (array_key_exists('return_code', $spbda5b4)) { $sp98e542->SetReturn_code($spbda5b4['return_code']); } if (array_key_exists('return_msg', $spbda5b4)) { $sp98e542->SetReturn_msg($spbda5b4['return_msg']); } if (array_key_exists('result_code', $spbda5b4)) { $sp98e542->SetResult_code($spbda5b4['result_code']); } if (array_key_exists('err_code', $spbda5b4)) { $sp98e542->SetErr_code($spbda5b4['err_code']); } if (array_key_exists('err_code_des', $spbda5b4)) { $sp98e542->SetErr_code_des($spbda5b4['err_code_des']); } if (array_key_exists('out_trade_no', $spbda5b4)) { $sp98e542->SetOut_trade_no($spbda5b4['out_trade_no']); } if (array_key_exists('device_info', $spbda5b4)) { $sp98e542->SetDevice_info($spbda5b4['device_info']); } try { self::report($sp98e542); } catch (WxPayException $sp019ea9) { } } private static function postXmlCurl($sp60a70a, $sp81923e, $sp4fa4eb = false, $spb42abf = 30) { $spd7a82f = curl_init(); curl_setopt($spd7a82f, CURLOPT_TIMEOUT, $spb42abf); if (WxPayConfig::CURL_PROXY_HOST != '0.0.0.0' && WxPayConfig::CURL_PROXY_PORT != 0) { curl_setopt($spd7a82f, CURLOPT_PROXY, WxPayConfig::CURL_PROXY_HOST); curl_setopt($spd7a82f, CURLOPT_PROXYPORT, WxPayConfig::CURL_PROXY_PORT); } curl_setopt($spd7a82f, CURLOPT_URL, $sp81923e); curl_setopt($spd7a82f, CURLOPT_SSL_VERIFYPEER, TRUE); curl_setopt($spd7a82f, CURLOPT_SSL_VERIFYHOST, 2); curl_setopt($spd7a82f, CURLOPT_HEADER, FALSE); curl_setopt($spd7a82f, CURLOPT_RETURNTRANSFER, TRUE); if ($sp4fa4eb == true) { curl_setopt($spd7a82f, CURLOPT_SSLCERTTYPE, 'PEM'); curl_setopt($spd7a82f, CURLOPT_SSLCERT, WxPayConfig::SSLCERT_PATH); curl_setopt($spd7a82f, CURLOPT_SSLKEYTYPE, 'PEM'); curl_setopt($spd7a82f, CURLOPT_SSLKEY, WxPayConfig::SSLKEY_PATH); } else { curl_setopt($spd7a82f, CURLOPT_SSL_VERIFYPEER, false); } curl_setopt($spd7a82f, CURLOPT_POST, TRUE); curl_setopt($spd7a82f, CURLOPT_POSTFIELDS, $sp60a70a); $spbda5b4 = curl_exec($spd7a82f); if ($spbda5b4) { curl_close($spd7a82f); return $spbda5b4; } else { $spd51c1c = curl_errno($spd7a82f); \Log::error('WxPat.Api.postXmlCurl Error: ' . curl_error($spd7a82f)); curl_close($spd7a82f); throw new WxPayException("curl出错，错误码: {$spd51c1c}"); } } private static function getMillisecond() { $sp8ff766 = explode(' ', microtime()); $sp8ff766 = $sp8ff766[1] . $sp8ff766[0] * 1000; $spd21273 = explode('.', $sp8ff766); $sp8ff766 = $spd21273[0]; return $sp8ff766; } }