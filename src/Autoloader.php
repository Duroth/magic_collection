<?php

namespace Duroth\Magic;

class Autoloader
{
    public function __invoke(string $className)
    {
        $regexp = '/^([A-Za-z0-9\\\\]+)Collection$/';
        if (false === preg_match($regexp, $className, $matches)) {
            return;
        };

        $itemClass = $matches[1];
        if (!class_exists($itemClass)) {
            return;
        }

        $baseClass = BaseCollection::class;

        $code = "class {$className} extends {$baseClass} { protected static \$allowedClass = '$itemClass'; }";

        eval($code);
        return true;
    }
}