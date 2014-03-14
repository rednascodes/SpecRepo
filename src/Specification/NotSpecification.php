<?php

namespace SpecRepo\Specification;
	
class NotSpecification extends CompositeSpecification
{	
	protected $_specification;
	
	public function __construct(SpecificationInterface $specification)
	{
		$this->_specification = $specification;
	}
	
	public function isSatisfiedBy($candidate)
	{
		return !$this->_specification->isSatisFiedBy($candidate);
	}
}
