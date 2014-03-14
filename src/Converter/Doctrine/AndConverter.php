<?php
	
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification;

Doctrine\ORM;

class AndConverter extends CompositeConverter
{
	public function convert(AndSpecification $specification, QueryBuilder $queryBuilder)
	{
		$subs = $specification->getSpecifications();
		
		$expressions = array();
		foreach ($subs as $sub) {
			$expressions[] = $this->getConverter($specification)->convert();
		}
		
		return call_user_func_array(array($queryBuilder->expr(), 'andx'), array($expressions));
	}
}
