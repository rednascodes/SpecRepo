<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification\SpecificationInterface;

use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

interface ConverterInterface
{
	public function convert(SpecificationInterface $specification, ExpressionBuilder $expressionBuilder);
}
