<?php

declare (strict_types = 1);

namespace Core;
use Helper\Url;
use Model\User;
use Model\Message;

Class AbstractController
{
    protected $data;

    public function __construct()
    {
        $this->data = [];
        $this->data['title'] = 'Kontrolinis';
        $this->data['meta_description'] = '';

    }

    protected function render(string $template): void
    {
        include_once PROJECT_ROOT_DIR . '/app/design/parts/header.php';
        include_once PROJECT_ROOT_DIR . '/app/design/' . $template . '.php';
        include_once PROJECT_ROOT_DIR . '/app/design/parts/footer.php';
    }

    public function url(string $path, ?string $param  = null): string
    {
        return Url::link($path, $param);
    }
}