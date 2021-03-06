<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification\SpecificationInterface;
use SpecRepo\Specification\AndSpecification;

use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

class AndConverter extends CompositeConverter
{
	public function convert(SpecificationInterface $specification, ExpressionBuilder $expressionBuilder)
	{
		if (!$specification instanceof AndSpecification) {
		    throw new \InvalidArgumentException('Invalid AndSpecification.');
		}
        
        $expression = $expressionBuilder->andx();
        
		foreach ($specification->getSpecifications() as $sub) {
			$expression->add($this->getConverter($sub)->convert($sub, $expressionBuilder));
		}
		
		return $expression;
	}
}
