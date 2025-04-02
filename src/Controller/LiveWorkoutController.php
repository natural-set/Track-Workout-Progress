<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class LiveWorkoutController
{
    
    public function liveWorkoutPage(Environment $twig): Response
    {
        $template = $twig->render(
            'user/live_workout.twig',
            [
                'title' => 'TWP - Live Workout'
            ]
    );
        return new Response($template);
    }
    
    public function getExercises(): JsonResponse
    {

        $filePath = __DIR__ . '/../../public/exercises/exercises.json';

        // Read the file contents
        if (!file_exists($filePath)) {
            return new JsonResponse(['error' => 'File not found'], 404);
        }

        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);

        return new JsonResponse($data);
    }

}
