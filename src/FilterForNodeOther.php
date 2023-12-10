<?php
declare(strict_types=1);

namespace Example;

class FilterForNodeOther implements \Vinograd\Scanner\Filter
{

    /**
     * @param mixed $element
     * @return bool
     */
    public function filter(mixed $element): bool
    {
        $name = array_key_first($element);
        return $name !== 'other';
    }

}