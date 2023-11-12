<?php

namespace App\Libraries;

class PaginatorLibrary
{
    public function renderPaginator($pager, $padding = 6, $query = "")
    {
        return view("components/paginator", ['pager' => $pager, 'padding' => $padding, 'query' => $query]);
    }
}