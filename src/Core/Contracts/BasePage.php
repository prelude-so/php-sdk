<?php

declare(strict_types=1);

namespace Prelude\Core\Contracts;

interface BasePage extends \Stringable
{
    /**
     * @return \Traversable<mixed>
     */
    public function pagingEachItem(): \Traversable;
}
