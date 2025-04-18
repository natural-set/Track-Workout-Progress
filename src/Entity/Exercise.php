<?php

namespace App\Entity;

use App\Repository\ExerciseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciseRepository::class)]
#[ORM\Table(name: 'exercise')]
class Exercise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'exercise_id')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: WorkoutBlock::class)]
    #[ORM\JoinColumn(name: 'block_id', referencedColumnName: 'block_id', nullable: false)]
    private ?WorkoutBlock $block = null;
    
    #[ORM\Column(name: 'exercise_name', length: 100)]
    private ?string $exerciseName = null;
    
    #[ORM\Column(name: 'exercise_order')]
    private ?int $exerciseOrder = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getBlock(): ?WorkoutBlock
    {
        return $this->block;
    }
    
    public function setBlock(WorkoutBlock $block): static
    {
        $this->block = $block;
        return $this;
    }
    
    public function getExerciseName(): ?string
    {
        return $this->exerciseName;
    }
    
    public function setExerciseName(string $exerciseName): static
    {
        $this->exerciseName = $exerciseName;
        return $this;
    }
    
    public function getExerciseOrder(): ?int
    {
        return $this->exerciseOrder;
    }
    
    public function setExerciseOrder(int $exerciseOrder): static
    {
        $this->exerciseOrder = $exerciseOrder;
        return $this;
    }
}
