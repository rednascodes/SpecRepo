<?php
	
namespace SpecRepo\Converter;

use SpecRepo\Specification\SpecificationInterface;

class Locator implements LocatorInterface
{
	protected $_converterClasses = array();
	protected $_converterInstances = array();
	
	public function __construct(array $converterClasses = array())
	{
		$this->_converterClasses = array_merge($this->_converterClasses, $converterClasses);
	}
	
	public function getConverter($specification)
	{
        if ($specification instanceof SpecificationInterface) {
			$specification = get_class($specification);
		}
        
        if (!is_string($specification)) {
            throw new \InvalidArgumentException('Invalid specification.');
        }
		
		if (array_key_exists($specification, $this->_converterInstances)) {
			return $this->_converterInstances[$specification];
		}
		
		if (!array_key_exists($specification, $this->_converterClasses)) {
			throw new \Exception('No converter set for specification ' . $specification);
		}
		
		return $this->_converterInstances[$specification] = 
			new $this->_converterClasses[$specification]($this);
	}
}
