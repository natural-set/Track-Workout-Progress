<?php

namespace App\Entity;

use App\Repository\WorkoutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkoutRepository::class)]
#[ORM\Table(name: 'workout')]
class Workout
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null; // corresponds to workout_id

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private ?User $user = null;
    
    #[ORM\Column(length: 255)]
    private ?string $title = null;
    
    #[ORM\Column]
    private ?int $time = null;
    
    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $note = null;
    
    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getUser(): ?User
    {
        return $this->user;
    }
    
    public function setUser(User $user): static
    {
        $this->user = $user;
        return $this;
    }
    
    public function getTitle(): ?string
    {
        return $this->title;
    }
    
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
    }
    
    public function getTime(): ?int
    {
        return $this->time;
    }
    
    public function setTime(int $time): static
    {
        $this->time = $time;
        return $this;
    }
    
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }
    
    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }
    
    public function setNote(?string $note): static
    {
        $this->note = $note;
        return $this;
    }
}
