<?php

namespace Yazan\Setting\Traits;

trait Scope
{
    public function scopeRelationNull($query)
    {
        return $query->where('model_id', null)->where('model_type', null);
    }
}
