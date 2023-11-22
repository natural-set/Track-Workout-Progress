<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UserController
{
    public function getAll(Environment $twig): Response
    {
        $template = $twig->render(
            'user/index.twig',
            ['param1' => 'Php is easy!']
        );

        return new Response($template);
    }
}
