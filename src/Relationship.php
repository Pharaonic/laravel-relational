<?php

namespace Pharaonic\Laravel\Relational;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $fillable = ['parent_type', 'parent_id', 'child_type', 'child_id'];

    /**
     * Get the parent of the relation record.
     */
    public function parent()
    {
        return $this->morphTo();
    }

    /**
     * Get the child of the relation record.
     */
    public function child()
    {
        return $this->morphTo();
    }
}
