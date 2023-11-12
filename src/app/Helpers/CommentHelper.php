<?php

namespace App\Helpers;

class CommentHelper
{
    public static function getOrder()
    {
        return [
            "asc" => "Ascending",
            "desc" => "Descending"
        ];
    }

    public static function getSortFields()
    {
        return [
            "id" => "Identifier",
            "created_at" => "Date Created"
        ];
    }
}