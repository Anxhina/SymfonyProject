<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersListRepository")
 */
class UsersList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="list")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name_of_list;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Movies", mappedBy="list")
     */
    private $movies;




 

    public function __construct()
    {
        $this->movie = new ArrayCollection();
        $this->list = new ArrayCollection();
        $this->movies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNameOfList(): ?string
    {
        return $this->name_of_list;
    }

    public function setNameOfList(string $name_of_list): self
    {
        $this->name_of_list = $name_of_list;

        return $this;
    }

        /**
         * @return Collection|Movies[]
         */
        public function getMovies(): Collection
        {
            return $this->movies;
        }

        public function addMovie(Movies $movie): self
        {
            if (!$this->movies->contains($movie)) {
                $this->movies[] = $movie;
                $movie->setList($this);
            }

            return $this;
        }

        public function removeMovie(Movies $movie): self
        {
            if ($this->movies->contains($movie)) {
                $this->movies->removeElement($movie);
                // set the owning side to null (unless already changed)
                if ($movie->getList() === $this) {
                    $movie->setList(null);
                }
            }

            return $this;
        }

     
   public function __toString() {
    return $this->name_of_list;
}
   

 

}