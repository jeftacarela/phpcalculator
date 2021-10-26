<?php

namespace Jakmall\Recruitment\Calculator\History\Infrastructure;

interface CommandHistoryManagerInterface
{
    /**
     * Returns array of command history.
     */
    public function findAll($driver, $id = array()): array;

    /**
     * Find a command by id.
     */
    public function filter($data, $id);

    /**
     * Log command data to storage.
     */
    public function log($command): bool;

    /**
     * Clear a command by id
     */
    public function clear($driver, $id): bool;

    /**
     * Clear all data from storage.
     */
    public function clearAll($driver, $context):bool;

    /**
     * Save data to storage.
     */
    public function saveToStorage($log_msg, $name) : void;

    public function driver($driver) : array;

    public function find($id);
}
