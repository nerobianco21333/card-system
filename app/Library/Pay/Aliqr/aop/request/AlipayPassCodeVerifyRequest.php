<?php
class AlipayPassCodeVerifyRequest { private $extInfo; private $operatorId; private $operatorType; private $verifyCode; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setExtInfo($sp9fce2d) { $this->extInfo = $sp9fce2d; $this->apiParas['ext_info'] = $sp9fce2d; } public function getExtInfo() { return $this->extInfo; } public function setOperatorId($sp6bbdc5) { $this->operatorId = $sp6bbdc5; $this->apiParas['operator_id'] = $sp6bbdc5; } public function getOperatorId() { return $this->operatorId; } public function setOperatorType($sp11b7a0) { $this->operatorType = $sp11b7a0; $this->apiParas['operator_type'] = $sp11b7a0; } public function getOperatorType() { return $this->operatorType; } public function setVerifyCode($sp03f7b0) { $this->verifyCode = $sp03f7b0; $this->apiParas['verify_code'] = $sp03f7b0; } public function getVerifyCode() { return $this->verifyCode; } public function getApiMethodName() { return 'alipay.pass.code.verify'; } public function setNotifyUrl($sp9f2e2a) { $this->notifyUrl = $sp9f2e2a; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spa8ca43) { $this->returnUrl = $spa8ca43; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp92f3bf) { $this->terminalType = $sp92f3bf; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp4f688a) { $this->terminalInfo = $sp4f688a; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spcc0ec7) { $this->prodCode = $spcc0ec7; } public function setApiVersion($sp19d892) { $this->apiVersion = $sp19d892; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spdf9da1) { $this->needEncrypt = $spdf9da1; } public function getNeedEncrypt() { return $this->needEncrypt; } }