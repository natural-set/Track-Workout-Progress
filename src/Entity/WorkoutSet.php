<?php

namespace App\Entity;

use App\Repository\SetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SetRepository::class)]
#[ORM\Table(name: 'workout_set')]
class WorkoutSet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'set_id')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Exercise::class)]
    #[ORM\JoinColumn(name: 'exercise_id', referencedColumnName: 'exercise_id', nullable: false)]
    private ?Exercise $exercise = null;
    
    #[ORM\Column(name: 'set_order')]
    private ?int $setOrder = null;
    
    #[ORM\Column]
    private ?int $reps = null;
    
    #[ORM\Column(type: 'float')]
    private ?float $weight = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $executionTime = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $restTime = null;
    
    #[ORM\Column(nullable: true)]
    private ?int $rpe = null;
    
    #[ORM\Column(length: 50, nullable: true)]
    private ?string $intensity = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getExercise(): ?Exercise
    {
        return $this->exercise;
    }
    
    public function setExercise(Exercise $exercise): static
    {
        $this->exercise = $exercise;
        return $this;
    }
    
    public function getSetOrder(): ?int
    {
        return $this->setOrder;
    }
    
    public function setSetOrder(int $setOrder): static
    {
        $this->setOrder = $setOrder;
        return $this;
    }
    
    public function getReps(): ?int
    {
        return $this->reps;
    }
    
    public function setReps(int $reps): static
    {
        $this->reps = $reps;
        return $this;
    }
    
    public function getWeight(): ?float
    {
        return $this->weight;
    }
    
    public function setWeight(float $weight): static
    {
        $this->weight = $weight;
        return $this;
    }
    
    public function getExecutionTime(): ?int
    {
        return $this->executionTime;
    }
    
    public function setExecutionTime(?int $executionTime): static
    {
        $this->executionTime = $executionTime;
        return $this;
    }
    
    public function getRestTime(): ?int
    {
        return $this->restTime;
    }
    
    public function setRestTime(?int $restTime): static
    {
        $this->restTime = $restTime;
        return $this;
    }
    
    public function getRpe(): ?int
    {
        return $this->rpe;
    }
    
    public function setRpe(?int $rpe): static
    {
        $this->rpe = $rpe;
        return $this;
    }
    
    public function getIntensity(): ?string
    {
        return $this->intensity;
    }
    
    public function setIntensity(?string $intensity): static
    {
        $this->intensity = $intensity;
        return $this;
    }
}
