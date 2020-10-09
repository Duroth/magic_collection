# duroth/magic_collection

_"The best idea I've ever had."_

This library enables runtime creation of type-safe object collections through the amazing technique known as `eval()`.

Need to store a set of `DateTimeImmutable` instances, but you're too lazy to write your own `DateTimeImmutableCollection`? 
With **Magic (Collection)**, you don't need to! Just create and register the Magic Autoloader, and you're done!

## Don't believe me? Just watch!

```php
<?php

// Step 1 of 1: Create and register the autoloader. Yes, you can invoke it as a functon.
$magicCollectionLoader = new \Duroth\Magic\Autoloader();
spl_autoload_register($magicCollectionLoader);

// Ta-da! Your new Collection is usable, just like that!
$dates = new \DateTimeImmutableCollection([ new DateTimeImmutable() ]);

// It's automatically typed, and raises exceptions on any invalid data!
$noGood = new \DateTimeImmutableCollection([ new DateTime() ]); // EXCEPTION!

// Works with just about every class, even your own!
$foos = new \Your\Silly\FooClassCollection([
    new \Your\Silly\FooClass(1),
    new \Your\Silly\FooClass(2),
]);
```

## Disclaimer

**The above is sarcasm. This project is a joke.**

Although the concept _does_ actually work, this library is intended as a stupid little joke,
and should not be used in any serious projects. It's a wonderful display of horrible antipatterns,
and a great example of how not to do things. Let that be all this is. 