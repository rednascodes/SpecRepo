<?php
    
namespace SpecRepo\Converter\Doctrine;

use SpecRepo\Specification\SpecificationInterface;
use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

class MockConverter implements ConverterInterface
{
    public function convert(SpecificationInterface $specification, ExpressionBuilder $expressionBuilder)
    {
        return $expressionBuilder->eq(1,1);
    }
}
    
?>