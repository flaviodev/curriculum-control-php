<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use ttm\dao\DaoFactory;
use curriculum\control\Config;

// replace with file to your own project bootstrap
require_once __DIR__.'/vendor/symfony/polyfill-mbstring/bootstrap.php';

$dao = DaoFactory::getInstance(Config::getConfigDB()["dao"], Config::getConfigDB());

$entityManager = $dao->getEntityManager(Config::getConfigDB());

return ConsoleRunner::createHelperSet($entityManager);

