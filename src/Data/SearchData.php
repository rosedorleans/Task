<?php

namespace App\Data;

use App\Entity\Category;

class SearchData
{
    public int $page = 1;

    public string $q = '';

    /**
     * @var Category[]
     */
    public array $categories = [];

}