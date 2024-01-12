<?php

namespace App\Repositories\Interfaces;

interface PaginationInterface
{
    /**
     * @return stclass[]
     */
    public function itens(): array;
    public function total(): int;
    public function isFisrtPage(): bool;
    public function isLastPage(): bool;
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
}
