<?php
	
namespace SpecConvert\Converter\Doctrine;

use SpecConvert\Converter;
use SpecConvert\Converter\Doctrine;
use SpecConvert\Specification;

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
