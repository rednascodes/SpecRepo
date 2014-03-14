<?php
	
namespace SpecRepo\Specification;

interface SpecificationInterface
{
	public function isSatisfiedBy($candidate);
}
