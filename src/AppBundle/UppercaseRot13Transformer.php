<?php

namespace AppBundle;

class UppercaseRot13Transformer implements Rot13TransformerInterface
{
    private $rot13transformer;

    public function __construct(Rot13TransformerInterface $rot13transformer)
    {
        $this->rot13transformer = $rot13transformer;
    }

    public function transform($value)
    {
        return strtoupper($this->rot13transformer->transform($value));
    }
}
