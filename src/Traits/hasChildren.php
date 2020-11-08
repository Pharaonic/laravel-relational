<?php

namespace Pharaonic\Laravel\Relational\Traits;

use Pharaonic\Laravel\Relational\Relationship;

trait hasChildren
{

    /**
     * Get Children List
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation\MorphMany
     */
    public function children()
    {
        return $this->morphMany(Relationship::class, 'parent');
    }

    /**
     * Get Single Child
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation\MorphOne
     */
    public function child()
    {
        return $this->morphOne(Relationship::class, 'parent');
    }

    /**
     * Attach Children
     *
     * @var Illuminate\Database\Eloquent\Model|array $parents Object or Array of Objects
     * @return void
     */
    public function attach(...$children)
    {
        if (is_array($children[0])) $children = $children[0];

        foreach ($children as $child) {
            Relationship::firstOrCreate([
                'parent_type'    => self::class,
                'parent_id'      => $this->id,

                'child_id'     => $child->id,
                'child_type'   => get_class($child)
            ]);
        }
    }

    /**
     * Detach Children
     *
     * @var Illuminate\Database\Eloquent\Model|array $parents Object or Array of Objects
     * @return void
     */
    public function detach(...$children)
    {
        if (is_array($children[0])) $children = $children[0];

        foreach ($children as $child) {
            $child = Relationship::where([
                'parent_type'    => self::class,
                'parent_id'      => $this->id,

                'child_id'     => $child->id,
                'child_type'   => get_class($child)
            ])->first();

            if ($child) $child->delete();
        }
    }
}
