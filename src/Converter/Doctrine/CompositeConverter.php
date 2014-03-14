<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Converter;
use SpecRepo\Converter\Doctrine;
use SpecRepo\Specification;

abstract class CompositeConverter implements ConverterInterface
{
	protected $_locator;
	
	public function __construct(LocatorInterface $locator)
	{
		$this->_locator = $locator;
	}
	
	public function getConverter($specification)
	{		
		return $this->_locator->getConverter($specification);
	}
}
