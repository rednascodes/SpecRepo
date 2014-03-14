<?php

namespace SpecConvert\Specification;
	
abstract class CompositeSpecification implements SpecificationInterface
{
	protected $_specifications = array();
	
	public function __construct()
	{
		foreach (func_get_args() as $specification) {
			if (!$specification instanceof SpecificationInterface) {
				throw new InvalidArgumentException('Invalid Specification as argument');
			}
			
			$this->_specifications[] = $specification;
		}
	}
	
	public function getSpecifications()
	{
		return $this->_specifications;
	}
}
