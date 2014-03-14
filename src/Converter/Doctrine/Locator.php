<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Converter\Locator as BaseLocator;

class Locator extends BaseLocator implements LocatorInterface
{
	protected $_converterClasses = array(
		'SpecRepo\Specification\AndSpecification' => 'SpecRepo\Converter\Doctrine\AndConverter',
		'SpecRepo\Specification\OrSpecification' => 'SpecRepo\Converter\Doctrine\OrConverter'
	);
}
