<?php

declare(strict_types=1);

namespace  App\Contracts;


interface Parser
{
    public function getParsedList(string $url): array;
    
    public function saveNewsInFile(string $url): void;

    public function saveNewsInTable(string $url): void;
}
