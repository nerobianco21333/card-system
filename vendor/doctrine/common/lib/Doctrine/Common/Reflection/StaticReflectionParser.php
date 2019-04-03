<?php
 namespace Doctrine\Common\Reflection; use Doctrine\Common\Annotations\TokenParser; use ReflectionException; class StaticReflectionParser implements ReflectionProviderInterface { protected $className; protected $shortClassName; protected $classAnnotationOptimize; protected $parsed = false; protected $namespace = ''; protected $useStatements = []; protected $docComment = [ 'class' => '', 'property' => [], 'method' => [] ]; protected $parentClassName = ''; protected $parentStaticReflectionParser; public function __construct($className, $finder, $classAnnotationOptimize = false) { $this->className = ltrim($className, '\\'); $lastNsPos = strrpos($this->className, '\\'); if ($lastNsPos !== false) { $this->namespace = substr($this->className, 0, $lastNsPos); $this->shortClassName = substr($this->className, $lastNsPos + 1); } else { $this->shortClassName = $this->className; } $this->finder = $finder; $this->classAnnotationOptimize = $classAnnotationOptimize; } protected function parse() { if ($this->parsed || !$fileName = $this->finder->findFile($this->className)) { return; } $this->parsed = true; $contents = file_get_contents($fileName); if ($this->classAnnotationOptimize) { if (preg_match("/\A.*^\s*((abstract|final)\s+)?class\s+{$this->shortClassName}\s+/sm", $contents, $matches)) { $contents = $matches[0]; } } $tokenParser = new TokenParser($contents); $docComment = ''; $last_token = false; while ($token = $tokenParser->next(false)) { if (is_array($token)) {switch ($token[0]) { case T_USE: $this->useStatements = array_merge($this->useStatements, $tokenParser->parseUseStatement()); break; case T_DOC_COMMENT: $docComment = $token[1]; break; case T_CLASS: if ($last_token !== T_PAAMAYIM_NEKUDOTAYIM) {$this->docComment['class'] = $docComment; $docComment = '';} break; case T_VAR: case T_PRIVATE: case T_PROTECTED: case T_PUBLIC: $token = $tokenParser->next(); if ($token[0] === T_VARIABLE) { $propertyName = substr($token[1], 1); $this->docComment['property'][$propertyName] = $docComment; continue 2; } if ($token[0] !== T_FUNCTION) { continue 2; } case T_FUNCTION: while (($token = $tokenParser->next()) && $token[0] !== T_STRING); $methodName = $token[1]; $this->docComment['method'][$methodName] = $docComment; $docComment = ''; break; case T_EXTENDS: $this->parentClassName = $tokenParser->parseClass(); $nsPos = strpos($this->parentClassName, '\\'); $fullySpecified = false; if ($nsPos === 0) { $fullySpecified = true; } else { if ($nsPos) { $prefix = strtolower(substr($this->parentClassName, 0, $nsPos)); $postfix = substr($this->parentClassName, $nsPos); } else { $prefix = strtolower($this->parentClassName); $postfix = ''; } foreach ($this->useStatements as $alias => $use) { if ($alias == $prefix) { $this->parentClassName = '\\' . $use . $postfix; $fullySpecified = true; } } } if (!$fullySpecified) { $this->parentClassName = '\\' . $this->namespace . '\\' . $this->parentClassName; } break;} } $last_token = $token[0]; } } protected function getParentStaticReflectionParser() { if (empty($this->parentStaticReflectionParser)) { $this->parentStaticReflectionParser = new static($this->parentClassName, $this->finder); } return $this->parentStaticReflectionParser; } public function getClassName() { return $this->className; } public function getNamespaceName() { return $this->namespace; } public function getReflectionClass() { return new StaticReflectionClass($this); } public function getReflectionMethod($methodName) { return new StaticReflectionMethod($this, $methodName); } public function getReflectionProperty($propertyName) { return new StaticReflectionProperty($this, $propertyName); } public function getUseStatements() { $this->parse(); return $this->useStatements; } public function getDocComment($type = 'class', $name = '') { $this->parse(); return $name ? $this->docComment[$type][$name] : $this->docComment[$type]; } public function getStaticReflectionParserForDeclaringClass($type, $name) { $this->parse(); if (isset($this->docComment[$type][$name])) { return $this; } if (!empty($this->parentClassName)) { return $this->getParentStaticReflectionParser()->getStaticReflectionParserForDeclaringClass($type, $name); } throw new ReflectionException('Invalid ' . $type . ' "' . $name . '"'); } } 