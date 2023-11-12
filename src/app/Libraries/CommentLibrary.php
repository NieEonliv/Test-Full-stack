<?php

namespace App\Libraries;

class CommentLibrary
{
    public function singleComment($params) {
        return view("components/single_comment",$params);
    }
}