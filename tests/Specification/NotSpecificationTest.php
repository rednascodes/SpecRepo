<?php

namespace SpecRepo\Specification;

use SpecRepo\TestCase;
use SpecRepo\Specification\MockSpecification;
use SpecRepo\Specification\NotSpecification;

class NotSpecificationTest extends TestCase
{
	public function testSatisfyingSpecDoesntSatisfy()
	{
		$mock = new MockSpecification(true);
		$spec = new NotSpecification($mock);
		
		$this->assertFalse($spec->isSatisfiedBy(new \stdClass));
	}
	
	public function testUnsatisfyingSpecSatisfies()
	{
		$mock = new MockSpecification(false);
		$spec = new NotSpecification($mock);
		
		$this->assertTrue($spec->isSatisfiedBy(new \stdClass));
	}
}
	
?>