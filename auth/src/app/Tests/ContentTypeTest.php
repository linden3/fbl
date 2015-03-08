<?php

use Fbl\App\Request\ContentType;

/**
 * Class ContentTypeTest
 */
class ContentTypeTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @test
     * @param mixed $input
     * @dataProvider nonStringInputs
     */
    public function shouldFailOnNonStringInput($input)
    {
        $this->setExpectedException('InvalidArgumentException');

        ContentType::fromString($input);
    }

    /**
     * @test
     */
    public function shouldBuildFromString()
    {
        $contentType = ContentType::fromString('application/json');

        $this->assertInstanceOf('Fbl\App\Request\ContentType', $contentType);
    }

    /**
     * @test
     */
    public function shouldDecideIfContainsJson()
    {
        $jsonContentType = ContentType::fromString('application/json');
        $nonJsonContentType = ContentType::fromString('text/html');

        $this->assertTrue($jsonContentType->isJson());
        $this->assertFalse($nonJsonContentType->isJson());
    }

    /**
     * @return array
     */
    public function nonStringInputs()
    {
        return array(
            array(0),
            array(null),
            array(true),
            array(array()),
            array(new StdClass)
        );
    }
}
