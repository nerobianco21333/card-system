<?php
class RoyaltyDetailInfo { private $serialNo; private $transInType; private $batchNo; private $outRelationId; private $transOutType; private $transOut; private $transIn; private $amount; private $desc; private $royaltyDetailInfo = array(); public function __construct() { $this->setTransInType('userId'); $this->setTransOutType('userId'); } public function RoyaltyDetailInfo() { $this->__construct(); } public function getRoyaltyDetailInfo() { return $this->royaltyDetailInfo; } public function getAmount() { return $this->amount; } public function getBatchNo() { return $this->batchNo; } public function getDesc() { return $this->desc; } public function getOutRelationId() { return $this->outRelationId; } public function getSerialNo() { return $this->serialNo; } public function getTransIn() { return $this->transIn; } public function getTransInType() { return $this->transInType; } public function getTransOut() { return $this->transOut; } public function getTransOutType() { return $this->transOutType; } public function setAmount($sp7ca622) { $this->amount = $sp7ca622; $this->royaltyDetailInfo['amount'] = $sp7ca622; } public function setBatchNo($sp226042) { $this->batchNo = $sp226042; $this->royaltyDetailInfo['batch_no'] = $sp226042; } public function setDesc($spb1dc44) { $this->desc = $spb1dc44; $this->royaltyDetailInfo['desc'] = $spb1dc44; } public function setOutRelationId($sp612405) { $this->outRelationId = $sp612405; $this->royaltyDetailInfo['out_relation_id'] = $sp612405; } public function setSerialNo($sp0cc01a) { $this->serialNo = $sp0cc01a; $this->royaltyDetailInfo['serial_no'] = $sp0cc01a; } public function setTransIn($spf3196d) { $this->transIn = $spf3196d; $this->royaltyDetailInfo['trans_in'] = $spf3196d; } public function setTransInType($sp6da484) { $this->transInType = $sp6da484; $this->royaltyDetailInfo['trans_in_type'] = $sp6da484; } public function setTransOut($sp2a9311) { $this->transOut = $sp2a9311; $this->royaltyDetailInfo['trans_out'] = $sp2a9311; } public function setTransOutType($sp5271c7) { $this->transOutType = $sp5271c7; $this->royaltyDetailInfo['trans_out_type'] = $sp5271c7; } }