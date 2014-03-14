<?php
	
namespace SpecConvert\Converter\Doctrine;

use SpecConvert\Specification;

use Doctrine\ORM;

interface ConverterInterface
{
	public function convert(SpecificationInterface $specification, QueryBuilder $queryBuilder);
}
