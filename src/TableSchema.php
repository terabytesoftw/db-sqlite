<?php

declare(strict_types=1);

namespace Yiisoft\Db\Sqlite;

use Yiisoft\Db\Schema\TableSchema as AbstractTableSchema;

final class TableSchema extends AbstractTableSchema
{
    private array $foreignKeys = [];

    /**
     * @return array foreign keys of this table. Each array element is of the following structure:
     *
     * ```php
     * [
     *  'ForeignTableName',
     *  'fk1' => 'pk1',  // pk1 is in foreign table
     *  'fk2' => 'pk2',  // if composite foreign key
     * ]
     * ```
     */
    public function getForeignKeys(): array
    {
        return $this->foreignKeys;
    }

    public function compositeFK(int $id, string $from, string $to): void
    {
        $this->foreignKeys[$id][$from] = $to;
    }

    public function foreignKey(int $id, array $to): void
    {
        $this->foreignKeys[$id] = $to;
    }

    public function foreignKeys(array $value): void
    {
        $this->foreignKeys = $value;
    }
}
