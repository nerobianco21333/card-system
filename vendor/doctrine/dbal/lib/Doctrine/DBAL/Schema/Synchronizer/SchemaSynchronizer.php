<?php
 namespace Doctrine\DBAL\Schema\Synchronizer; use Doctrine\DBAL\Schema\Schema; interface SchemaSynchronizer { function getCreateSchema(Schema $createSchema); function getUpdateSchema(Schema $toSchema, $noDrops = false); function getDropSchema(Schema $dropSchema); function getDropAllSchema(); function createSchema(Schema $createSchema); function updateSchema(Schema $toSchema, $noDrops = false); function dropSchema(Schema $dropSchema); function dropAllSchema(); } 