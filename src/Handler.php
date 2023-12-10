<?php
declare(strict_types=1);

namespace Example;

use Vinograd\Scanner\AbstractTraversalStrategy;
use Vinograd\Scanner\Visitor;

class Handler implements Visitor
{

    /**
     * @inheritDoc
     */
    public function scanStarted(AbstractTraversalStrategy $scanStrategy, mixed $detect): void
    {
    }

    /**
     * @inheritDoc
     */
    public function scanCompleted(AbstractTraversalStrategy $scanStrategy, mixed $detect): void
    {
    }

    /**
     * @inheritDoc
     */
    public function visitLeaf(AbstractTraversalStrategy $scanStrategy, mixed $parentNode, mixed $currentElement, mixed $data = null): void
    {
        $leaf = array_shift($currentElement);
        echo 'Execute: ', $leaf, PHP_EOL;
    }

    /**
     * @inheritDoc
     */
    public function visitNode(AbstractTraversalStrategy $scanStrategy, mixed $parentNode, mixed $currentNode, mixed $data = null): void
    {
        $nodeName = array_key_first($currentNode);
        echo 'Start: ' . $nodeName, PHP_EOL;
    }

}