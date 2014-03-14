<?php

namespace SpecConvert\Specification;
	
class OrSpecification extends CompositeSpecification
{
	public function isSatisfiedBy($candidate)
	{
		foreach ($this->_specifications as $specification) {
			if ($specification->isSatisfiedBy($candidate)) {
				return true;
			}
		}
		
		return false;
	}
}
