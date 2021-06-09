<?php

namespace Pharaonic\Laravel\Relational;

use Pharaonic\Laravel\Relational\Traits\{HasChildren, HasParents};

trait HasRelationships
{
    use hasChildren, hasParents;
}
