<?php
	
namespace SpecConvert\Converter;

use SpecConvert\Specification;

class Locator implements LocatorInterface
{
	protected $_converterClasses = array();
	protected $_converterInstances = array();
	
	public function __construct(array $converterClasses)
	{
		$this->_converterClasses = array_merge($this->_convertClasses, $converterClasses);
	}
	
	public function getConverter($specification)
	{
		if ($specification instanceof SpecificationInterface) {
			$specification = get_class($specification);
		}
		
		if (!array_key_exists($specification, $this->_converterInstances)) {
			return $this->_converterInstances[$specification];
		}
		
		if (!array_key_exists($specification, $this->_converterClasses)) {
			throw new Exception('No converter set for specification ' . $specification);
		}
		
		return $this->_converterInstances[$specification] = 
			new $this->_converterClasses[$specification]($this);
	}
}
