<?php

use Vendor\Package\SomeNamespace\{ClassZ, SubnamespaceOne\ClassA, SubnamespaceOne\ClassB, SubnamespaceTwo\ClassY,};
use Vendor\Package\SomeNamespace\{ClassZ, SubnamespaceOne\AnotherNamespace\ClassA, SubnamespaceOne\ClassB,};
use Vendor\Package\SomeNamespace\{ClassZ,
    SubnamespaceOne
    \AnotherNamespace
    \ClassB,
    SubnamespaceOne /* comment */
    \AnotherNamespace // comment
    \ClassA,
};
use Vendor\Package\SomeNamespace\{ClassZ, SubnamespaceOne\AnotherNamespace\ClassA, SubnamespaceOne\ClassB,};

// phpcs:set PSR12.Namespaces.CompoundNamespaceDepth maxDepth 3
