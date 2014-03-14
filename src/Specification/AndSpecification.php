<?php

namespace SpecRepo\Specification;
	
class AndSpecification extends CompositeSpecification
{	
	public function isSatisfiedBy($candidate)
	{
		foreach ($this->_specifications as $specification) {
			if (!$specification->isSatisfiedBy($candidate)) {
				return false;
			}
		}
		
		return true;
	}
}
