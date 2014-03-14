<?php
	
namespace SpecRepo\Specification;

class MockSpecification implements SpecificationInterface
{
	protected $_isSatisfied;
	
	public function __construct($isSatisfied)
	{
		$this->_isSatisfied = $isSatisfied;
	}
	
	public function isSatisfiedBy($candidate)
	{
		return $this->_isSatisfied;
	}
}
	
?>