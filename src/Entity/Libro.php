<?php

namespace App\Entity;

use App\Repository\LibroRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibroRepository::class)]
#[ORM\Table(name: 'libro')]
class Libro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $titulo;
    #[ORM\Column(type: 'integer')]
    private ?int $anioPublicacion;
    #[ORM\Column(type: 'integer')]
    private ?int $paginas;
    #[ORM\ManyToOne(targetEntity: Editorial::class, inversedBy: 'libros')]
    private ?Editorial $editorial;
    #[ORM\ManyToMany(targetEntity: Autor::class, inversedBy: 'libros')]
    private ?Collection $autores;
    public function __construct()
    {
        $this->autores = new ArrayCollection();
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): Libro
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getAnioPublicacion(): ?int
    {
        return $this->anioPublicacion;
    }

    public function setAnioPublicacion(?int $anioPublicacion): Libro
    {
        $this->anioPublicacion = $anioPublicacion;
        return $this;
    }

    public function getPaginas(): ?int
    {
        return $this->paginas;
    }

    public function setPaginas(?int $paginas): Libro
    {
        $this->paginas = $paginas;
        return $this;
    }

    public function getEditorial(): ?Editorial
    {
        return $this->editorial;
    }

    public function setEditorial(?Editorial $editorial): Libro
    {
        $this->editorial = $editorial;
        return $this;
    }

    /**
     * @return Collection<int, Autor>
     **/
    public function getAutores(): ?Collection
    {
        return $this->autores;
    }

    public function addAutor(Autor $autor): static
    {
        if (!$this->autores->contains($autor)) {
            $this->autores->add($autor);
        }
        return $this;
    }

    public function removeAutor(Autor $autor): static
    {
        $this->autores->removeElement($autor);
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}