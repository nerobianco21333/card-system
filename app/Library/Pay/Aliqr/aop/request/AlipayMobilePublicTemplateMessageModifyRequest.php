<?php
class AlipayMobilePublicTemplateMessageModifyRequest { private $templateId; private $tradeSetting; private $apiParas = array(); private $terminalType; private $terminalInfo; private $prodCode; private $apiVersion = '1.0'; private $notifyUrl; private $returnUrl; private $needEncrypt = false; public function setTemplateId($sp1c8f8e) { $this->templateId = $sp1c8f8e; $this->apiParas['template_id'] = $sp1c8f8e; } public function getTemplateId() { return $this->templateId; } public function setTradeSetting($spc75d2d) { $this->tradeSetting = $spc75d2d; $this->apiParas['trade_setting'] = $spc75d2d; } public function getTradeSetting() { return $this->tradeSetting; } public function getApiMethodName() { return 'alipay.mobile.public.template.message.modify'; } public function setNotifyUrl($sp9f2e2a) { $this->notifyUrl = $sp9f2e2a; } public function getNotifyUrl() { return $this->notifyUrl; } public function setReturnUrl($spa8ca43) { $this->returnUrl = $spa8ca43; } public function getReturnUrl() { return $this->returnUrl; } public function getApiParas() { return $this->apiParas; } public function getTerminalType() { return $this->terminalType; } public function setTerminalType($sp92f3bf) { $this->terminalType = $sp92f3bf; } public function getTerminalInfo() { return $this->terminalInfo; } public function setTerminalInfo($sp4f688a) { $this->terminalInfo = $sp4f688a; } public function getProdCode() { return $this->prodCode; } public function setProdCode($spcc0ec7) { $this->prodCode = $spcc0ec7; } public function setApiVersion($sp19d892) { $this->apiVersion = $sp19d892; } public function getApiVersion() { return $this->apiVersion; } public function setNeedEncrypt($spdf9da1) { $this->needEncrypt = $spdf9da1; } public function getNeedEncrypt() { return $this->needEncrypt; } }