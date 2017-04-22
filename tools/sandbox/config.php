<?php

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

if (!file_exists($file = __DIR__.'/../../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;
$loader->add('Document', __DIR__ . '/../../src/Blank/AdminBundle/');
$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm_sandbox');
// $config->setLoggerCallable(function(array $log) { print_r($log); });
// $config->setMetadataCacheImpl(new Doctrine\Common\Cache\ApcCache());
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/Documents'));

AnnotationDriver::registerAnnotationClasses();

$dm = DocumentManager::create($connection, $config);
