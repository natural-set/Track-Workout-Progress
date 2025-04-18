<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Workout;
use App\Entity\WorkoutBlock;
use App\Entity\Exercise;
use App\Entity\WorkoutSet;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setName('Erison Silva');
        $user1->setEmail('hey@erison.work');

        $manager->persist($user1);

        $user2 = new User();
        $user2->setName('Willianderson Soares');
        $user2->setEmail('hey@Will.com');

        $manager->persist($user2);

        $user3 = new User();
        $user3->setName('John Doe');
        $user3->setEmail('hey@John.com');

        $manager->persist($user3);

        $manager->flush();

        // Workout
        $workout = new Workout();
        $workout->setUser($user2); // assuming Workout has a ManyToOne to User
        $workout->setTitle('legs');
        $workout->setTime(1080);
        $workout->setDate(new \DateTime('03-04-2025'));
        $workout->setNote('workout based on lower body doing squats and stiff');
        $manager->persist($workout);

        // Workout Blocks
        $block1 = new WorkoutBlock();
        $block1->setWorkout($workout);
        $block1->setBlockType('singleset');
        $block1->setBlockOrder(1);
        $manager->persist($block1);

        $block2 = new WorkoutBlock();
        $block2->setWorkout($workout);
        $block2->setBlockType('biset');
        $block2->setBlockOrder(2);
        $manager->persist($block2);

        // Exercises
        $exercise1 = new Exercise();
        $exercise1->setBlock($block1);
        $exercise1->setExerciseName('squat');
        $exercise1->setExerciseOrder(1);
        $manager->persist($exercise1);

        $exercise2 = new Exercise();
        $exercise2->setBlock($block2);
        $exercise2->setExerciseName('stiff');
        $exercise2->setExerciseOrder(1);
        $manager->persist($exercise2);

        $exercise3 = new Exercise();
        $exercise3->setBlock($block2);
        $exercise3->setExerciseName('leg_curl');
        $exercise3->setExerciseOrder(2);
        $manager->persist($exercise3);

        $manager->flush();

        // Sets for exercise1 (squat)
        $manager->persist((new WorkoutSet())->setExercise($exercise1)->setSetOrder(1)->setReps(7)->setWeight(80)->setExecutionTime(21)->setRestTime(180)->setRpe(4)->setIntensity('low'));
        $manager->persist((new WorkoutSet())->setExercise($exercise1)->setSetOrder(2)->setReps(10)->setWeight(80)->setExecutionTime(30)->setRestTime(180)->setRpe(5)->setIntensity('low'));
        $manager->persist((new WorkoutSet())->setExercise($exercise1)->setSetOrder(3)->setReps(6)->setWeight(90)->setExecutionTime(21)->setRestTime(180)->setRpe(8)->setIntensity('low'));

        // Sets for exercise2 (stiff)
        $manager->persist((new WorkoutSet())->setExercise($exercise2)->setSetOrder(1)->setReps(9)->setWeight(80)->setExecutionTime(21)->setRestTime(0)->setRpe(3));
        $manager->persist((new WorkoutSet())->setExercise($exercise2)->setSetOrder(2)->setReps(12)->setWeight(80)->setExecutionTime(30)->setRestTime(0)->setRpe(7));
        $manager->persist((new WorkoutSet())->setExercise($exercise2)->setSetOrder(3)->setReps(8)->setWeight(90)->setExecutionTime(21)->setRestTime(0)->setRpe(9));

        // Sets for exercise3 (leg_curl)
        $manager->persist((new WorkoutSet())->setExercise($exercise3)->setSetOrder(1)->setReps(10)->setWeight(50)->setExecutionTime(20)->setRestTime(180)->setRpe(6));
        $manager->persist((new WorkoutSet())->setExercise($exercise3)->setSetOrder(2)->setReps(10)->setWeight(50)->setExecutionTime(20)->setRestTime(180)->setRpe(7));
        $manager->persist((new WorkoutSet())->setExercise($exercise3)->setSetOrder(3)->setReps(10)->setWeight(50)->setExecutionTime(20)->setRestTime(180)->setRpe(7));

        $manager->flush();
    }
}
