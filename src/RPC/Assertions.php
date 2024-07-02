<?php

namespace Ufo\RpcObject\RPC;

use Attribute;
use Symfony\Component\Validator\Constraint;
use Ufo\RpcObject\Transformer\Transformer;

#[Attribute(Attribute::TARGET_PARAMETER)]
final readonly class Assertions
{
    /**
     * @param Constraint[] $assertions
     */
    public function __construct(
        public array $assertions
    ) {}

    public function toArray(): array
    {
        $array = [];
        foreach ($this->assertions as $assertion) {
            $array[] = Transformer::getDefault()->normalize($assertion);
        }

        return $array;
    }

}