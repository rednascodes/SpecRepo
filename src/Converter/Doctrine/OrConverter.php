<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification\SpecificationInterface;
use SpecRepo\Specification\OrSpecification;

use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

class OrConverter extends CompositeConverter
{
	public function convert(SpecificationInterface $specification, ExpressionBuilder $expressionBuilder)
	{
		if (!$specification instanceof OrSpecification) {
		    throw new \InvalidArgumentException('Invalid OrSpecification.');
		}
        
        $expression = $expressionBuilder->orx();
        
		foreach ($specification->getSpecifications() as $sub) {
			$expression->add($this->getConverter($sub)->convert($sub, $expressionBuilder));
		}
		
		return $expression;
	}
}
