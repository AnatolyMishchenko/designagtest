<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RevisionScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('revision_id', 1);
    }
}
