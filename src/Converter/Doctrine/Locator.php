<?php
	
namespace SpecConvert\Converter\Doctrine;

use SpecConvert\Converter\Locator as BaseLocator;

class Locator extends BaseLocator
{
	protected $_converterClasses = array(
		'SpecConvert\Specification\AndSpecification' => 'SpecConvert\Converter\Doctrine\AndConverter',
		'SpecConvert\Specification\OrSpecification' => 'SpecConvert\Converter\Doctrine\OrConverter'
	);
}
	
?>