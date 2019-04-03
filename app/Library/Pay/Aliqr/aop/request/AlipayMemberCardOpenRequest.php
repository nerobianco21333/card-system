<?php
class AlipayMemberCardOpenRequest { private $bizSerialNo; private $cardMerchantInfo; private $cardUserInfo; private $extInfo; private $externalCardNo; private $requestFrom; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setBizSerialNo($sp8f8e00) { $this->bizSerialNo = $sp8f8e00; $this->apiParas['biz_serial_no'] = $sp8f8e00; } public function getBizSerialNo() { return $this->bizSerialNo; } public function setCardMerchantInfo($sp88ace8) { $this->cardMerchantInfo = $sp88ace8; $this->apiParas['card_merchant_info'] = $sp88ace8; } public function getCardMerchantInfo() { return $this->cardMerchantInfo; } public function setCardUserInfo($sp2fcf79) { $this->cardUserInfo = $sp2fcf79; $this->apiParas['card_user_info'] = $sp2fcf79; } public function getCardUserInfo() { return $this->cardUserInfo; } public function setExtInfo($sp9fce2d) { $this->extInfo = $sp9fce2d; $this->apiParas['ext_info'] = $sp9fce2d; } public function getExtInfo() { return $this->extInfo; } public function setExternalCardNo($sp2c80b0) { $this->externalCardNo = $sp2c80b0; $this->apiParas['external_card_no'] = $sp2c80b0; } public function getExternalCardNo() { return $this->externalCardNo; } public function setRequestFrom($sp794521) { $this->requestFrom = $sp794521; $this->apiParas['request_from'] = $sp794521; } public function getRequestFrom() { return $this->requestFrom; } public function getApiMethodName() { return 'alipay.member.card.open'; } public function setNotifyUrl($sp9f2e2a) { $this->notifyUrl = $sp9f2e2a; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spa8ca43) { $this->returnUrl = $spa8ca43; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp92f3bf) { $this->terminalType = $sp92f3bf; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp4f688a) { $this->terminalInfo = $sp4f688a; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spcc0ec7) { $this->prodCode = $spcc0ec7; } public function setApiVersion($sp19d892) { $this->apiVersion = $sp19d892; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spdf9da1) { $this->needEncrypt = $spdf9da1; } public function getNeedEncrypt() { return $this->needEncrypt; } }