<?php

namespace SpecRepo\Converter\Doctrine;

use SpecRepo\TestCase;
use SpecRepo\Converter\Doctrine\AndConverter;
use SpecRepo\Converter\Doctrine\OrConverter;
use SpecRepo\Converter\Doctrine\DriverConnectionMock;
use SpecRepo\Converter\Doctrine\Locator;
use SpecRepo\Specification\AndSpecification;
use SpecRepo\Specification\OrSpecification;
use SpecRepo\Specification\MockSpecification;

use Doctrine\DBAL\Query\Expression\ExpressionBuilder;

class CompositeConverterTest extends TestCase
{    
    protected $_expressionBuilder;
    protected $_locator;
    
    public function setUp()
    {
        $this->_expressionBuilder = new ExpressionBuilder($this->getMock('Doctrine\DBAL\Connection', array(), array(), '', false));
        $this->_locator = new Locator(array(
            'SpecRepo\Specification\MockSpecification' => 'SpecRepo\Converter\Doctrine\MockConverter'
        ));
    }
    
    public function testReturnValueAndConverter()
    {
        $spec = new AndSpecification(new MockSpecification(true), new MockSpecification(true), new MockSpecification(true));
        
        $converter = new AndConverter($this->_locator);
        
        $expression = $converter->convert($spec, $this->_expressionBuilder);

        $this->assertEquals('(1 = 1) AND (1 = 1) AND (1 = 1)', (string) $expression);
    }
    
    public function testReturnValueOrConverter()
    {
        $spec = new OrSpecification(new MockSpecification(true), new MockSpecification(true), new MockSpecification(true));
        
        $converter = new OrConverter($this->_locator);
        
        $expression = $converter->convert($spec, $this->_expressionBuilder);

        $this->assertEquals('(1 = 1) OR (1 = 1) OR (1 = 1)', (string) $expression);
    }
}
