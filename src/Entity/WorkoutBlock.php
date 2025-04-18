<?php

namespace App\Entity;

use App\Repository\WorkoutBlockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkoutBlockRepository::class)]
#[ORM\Table(name: 'workout_block')]
class WorkoutBlock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'block_id')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Workout::class)]
    #[ORM\JoinColumn(name: 'workout_id', referencedColumnName: 'id', nullable: false)]
    private ?Workout $workout = null;
    
    #[ORM\Column(length: 50)]
    private ?string $blockType = null;
    
    #[ORM\Column]
    private ?int $blockOrder = null;

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getWorkout(): ?Workout
    {
        return $this->workout;
    }
    
    public function setWorkout(Workout $workout): static
    {
        $this->workout = $workout;
        return $this;
    }
    
    public function getBlockType(): ?string
    {
        return $this->blockType;
    }
    
    public function setBlockType(string $blockType): static
    {
        $this->blockType = $blockType;
        return $this;
    }
    
    public function getBlockOrder(): ?int
    {
        return $this->blockOrder;
    }
    
    public function setBlockOrder(int $blockOrder): static
    {
        $this->blockOrder = $blockOrder;
        return $this;
    }
}
