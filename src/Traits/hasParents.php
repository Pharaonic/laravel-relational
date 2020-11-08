<?php

namespace Pharaonic\Laravel\Relational\Traits;

use Pharaonic\Laravel\Relational\Relationship;

trait hasParents
{
    /**
     * Get Parents List
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation\MorphMany
     */
    public function parents()
    {
        return $this->morphMany(Relationship::class, 'child');
    }

    /**
     * Get Single Parent
     *
     * @return Illuminate\Database\Eloquent\Relations\Relation\MorphOne
     */
    public function parent()
    {
        return $this->morphOne(Relationship::class, 'child');
    }

    /**
     * Attach To Parents
     *
     * @var Illuminate\Database\Eloquent\Model|array $parents Object or Array of Objects
     * @return void
     */
    public function attachTo(...$parents)
    {
        if (is_array($parents[0])) $parents = $parents[0];

        foreach ($parents as $parent) {
            Relationship::firstOrCreate([
                'parent_id'     => $parent->id,
                'parent_type'   => get_class($parent),

                'child_type'    => self::class,
                'child_id'      => $this->id
            ]);
        }
    }

    /**
     * Detach From Parents
     *
     * @var Illuminate\Database\Eloquent\Model|array $parents Object or Array of Objects
     * @return void
     */
    public function detachFrom(...$parents)
    {
        if (is_array($parents[0])) $parents = $parents[0];

        foreach ($parents as $parent) {

            $parent = Relationship::where([
                'parent_id'     => $parent->id,
                'parent_type'   => get_class($parent),
                'child_type'    => self::class,
                'child_id'      => $this->id
            ])->first();

            if ($parent) $parent->delete();
        }
    }
}
