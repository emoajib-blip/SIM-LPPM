<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;

trait SeedHelper
{
    /**
     * Assert that the given model/table doesn't contain duplicate values for a
     * particular column. Throws an exception if duplicates are found, which will
     * abort the seeding process. Useful for catching accidental copy/paste or
     * manual edits that produce conflicting master data.
     *
     * @param  string  $modelClass  Eloquent model class name
     * @param  string  $column  Column that must be unique
     */
    protected function assertUnique(string $modelClass, string $column): void
    {
        /** @var \Illuminate\Database\Query\Builder $query */
        $query = $modelClass::query();

        $duplicates = $query->select($column)
            ->groupBy($column)
            ->havingRaw('COUNT(*) > 1')
            ->pluck($column);

        if ($duplicates->isNotEmpty()) {
            throw new \RuntimeException("Duplicate values found in {$modelClass}: {$column} => [".
                $duplicates->implode(', ').']');
        }
    }
}
