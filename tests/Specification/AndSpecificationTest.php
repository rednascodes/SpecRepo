<?php

namespace SpecConvert\Specification;

use SpecConvert\TestCase;
use SpecConvert\Specification\AndSpecification;

class AndSpecificationTest extends TestCase
{	
	public function testOnlySatisfyingSpecsSatisfy()
    {	
		$mock1 = new MockSpecification(true);
		$mock2 = new MockSpecification(true);
		$mock3 = new MockSpecification(true);
		
		$spec = new AndSpecification($mock1, $mock2);
		$this->assertTrue($spec->isSatisfiedBy(new \stdClass));
		
		$spec = new AndSpecification($mock1, $mock2, $mock3);
		$this->assertTrue($spec->isSatisfiedBy(new \stdClass));
    }
	
	public function testOnlyUnsatisfyingSpecsDontSatisfy()
	{
		$mock1 = new MockSpecification(false);
		$mock2 = new MockSpecification(false);
		
		$spec = new AndSpecification($mock1, $mock2);
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
		
		$mock3 = new MockSpecification(false);
		
		$spec = new AndSpecification($mock1, $mock2, $mock3);
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
	}
	
	public function testSatisfyingAndUnsatisfyingSpecDontSatisfy()
	{
		$mock1 = new MockSpecification(true);
		$mock2 = new MockSpecification(false);
		$mock3 = new MockSpecification(false);
		
		$spec = new AndSpecification($mock1, $mock2, $mock3);
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
		
		$spec = new AndSpecification($mock3, $mock2, $mock1);
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
		
		$spec = new AndSpecification($mock2, $mock1, $mock3);
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
	}
}
