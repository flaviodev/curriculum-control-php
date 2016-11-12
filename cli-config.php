<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use ttm\dao\DaoFactory;
use curriculum\Config;

// replace with file to your own project bootstrap
require_once __DIR__.'/vendor/symfony/polyfill-mbstring/bootstrap.php';


$daos = DaoFactory::getInstance(Config::getDaoConfig());

foreach ($daos as $dao) {
	$entityManager = $dao->getEntityManager(Config::getDaoConfig());
	return ConsoleRunner::createHelperSet($entityManager);
}






