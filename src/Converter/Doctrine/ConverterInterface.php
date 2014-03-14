<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification;

use Doctrine\ORM;

interface ConverterInterface
{
	public function convert(SpecificationInterface $specification, QueryBuilder $queryBuilder);
}
