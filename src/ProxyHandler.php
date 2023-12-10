<?php
declare(strict_types=1);

namespace Example;

use Vinograd\Scanner\AbstractTraversalStrategy;
use Vinograd\Scanner\Scanner;
use Vinograd\Scanner\Visitor;

class ProxyHandler implements Visitor
{

    private Visitor $handler;
    private Scanner $scanner;

    /**
     * @param Visitor $handler
     * @param Scanner $scanner
     */
    public function __construct(Visitor $handler, Scanner $scanner)
    {
        $this->handler = $handler;
        $this->scanner = $scanner;
    }

    /**
     * @inheritDoc
     */
    public function scanStarted(AbstractTraversalStrategy $scanStrategy, mixed $detect): void
    {
        $this->handler->scanStarted($scanStrategy, $detect);
    }

    /**
     * @inheritDoc
     */
    public function scanCompleted(AbstractTraversalStrategy $scanStrategy, mixed $detect): void
    {
        $this->handler->scanCompleted($scanStrategy, $detect);
    }

    /**
     * @inheritDoc
     */
    public function visitLeaf(AbstractTraversalStrategy $scanStrategy, mixed $parentNode, mixed $currentElement, mixed $data = null): void
    {
        $this->handler->visitLeaf($scanStrategy, $parentNode, $currentElement);
    }

    /**
     * @inheritDoc
     */
    public function visitNode(AbstractTraversalStrategy $scanStrategy, mixed $parentNode, mixed $currentNode, mixed $data = null): void
    {
        $name = array_key_first($currentNode);
        if ($name !== 'tasks') {
            $this->handler->visitNode($scanStrategy, $parentNode, $currentNode);
        }
        $this->scanner->traverse($currentNode[$name]);
    }

}