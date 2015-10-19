<?php

namespace AppBundle;

class TwitterClient
{
    private $rot13Transformer;

    public function __construct(Rot13TransformerInterface $rot13Transformer)
    {
        $this->rot13Transformer = $rot13Transformer;
    }

    public function tweetInRot13($user, $key, $status)
    {
        $transformedStatus = $this->rot13Transformer->transform($status);

        // Connect to Twitter and send the encoded status
    }
}
