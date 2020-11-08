<?php

namespace Pharaonic\Laravel\Relational;

use Pharaonic\Laravel\Relational\Traits\{hasChildren, hasParents};

trait hasRelationships
{
    use hasChildren, hasParents;
}
