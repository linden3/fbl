<?php
namespace Fbl\App\Request;

use InvalidArgumentException;

/**
 * Class ContentType
 * @package Fbl\App\Request
 */
class ContentType
{
    /**
     * @var string
     */
    private $contentType;

    /**
     * @param $contentType
     */
    private function __construct($contentType)
    {
        if (!is_string($contentType)) {
            throw new InvalidArgumentException("String expected!");
        }

        $this->contentType = $contentType;
    }

    /**
     * @param string $input
     * @return ContentType
     */
    public static function fromString($input)
    {
        return new self($input);
    }

    /**
     * @return bool
     */
    public function isJson()
    {
        return 0 === strpos($this->contentType, 'application/json');
    }
}
