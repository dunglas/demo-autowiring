<?php

namespace AppBundle;

class Rot13Transformer implements Rot13TransformerInterface
{
    public function transform($value)
    {
        return str_rot13($value);
    }
}
