<?php

namespace Helper;

class Url
{
    public static function redirect(string $route): void
    {
        header('Location: '. BASE_URL .$route);
        exit;
    }

    public static function link(string $path, ?string $param = null): string
    {
        $link = BASE_URL.$path;

        if($param !== null){
            $link .= '/'.$param;
        }

        return $link;
    }

    public static function slug(string $title): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        return $slug;
    }
}