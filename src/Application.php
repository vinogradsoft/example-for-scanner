<?php
declare(strict_types=1);

namespace Example;

use Vinograd\Scanner\ArrayDriver;
use Vinograd\Scanner\Scanner;
use Vinograd\Scanner\SingleStrategy;

class Application
{

    /**
     * @param array $config
     * @return void
     */
    public function run(array $config): void
    {
        $scanner = new Scanner();
        $scanner->setDriver(new ArrayDriver());
        $scanner->setVisitor(new ProxyHandler(new Handler(), $scanner));
        $scanner->setStrategy(new SingleStrategy());
        $scanner->addNodeFilter(new FilterForNodeOther());
        $scanner->traverse($config);
    }

}