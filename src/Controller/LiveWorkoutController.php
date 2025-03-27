<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class LiveWorkoutController
{
    
    public function liveWorkoutPage(Environment $twig): Response
    {
        $template = $twig->render(
            'user/live_workout.twig',
            [
                'title' => 'TWP - Live Workout',
            ]
    );
        return new Response($template);
    }
    

}
