<?php
	
namespace SpecConvert\Specification;

interface SpecificationInterface
{
	public function isSatisfiedBy($candidate);
}
