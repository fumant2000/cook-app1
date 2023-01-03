<?php

namespace App\Entity;

use App\Entity\Traits\HasIdTrait;
use App\Entity\Traits\HasNameTrait;
use App\Repository\IngredientGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientGroupRepository::class)]
class IngredientGroup
{

    use HasIdTrait;
    use HasNameTrait;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $priority = null;

    #[ORM\OneToMany(mappedBy: 'ingredientGroup', targetEntity: RecipeHasIngredient::class)]
    private Collection $recipeHasIngredients;

    public function __construct()
    {
        $this->recipeHasIngredients = new ArrayCollection();
    }

  

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return Collection<int, RecipeHasIngredient>
     */
    public function getRecipeHasIngredients(): Collection
    {
        return $this->recipeHasIngredients;
    }

    public function addRecipeHasIngredient(RecipeHasIngredient $recipeHasIngredient): self
    {
        if (!$this->recipeHasIngredients->contains($recipeHasIngredient)) {
            $this->recipeHasIngredients->add($recipeHasIngredient);
            $recipeHasIngredient->setIngredientGroup($this);
        }

        return $this;
    }

    public function removeRecipeHasIngredient(RecipeHasIngredient $recipeHasIngredient): self
    {
        if ($this->recipeHasIngredients->removeElement($recipeHasIngredient)) {
            // set the owning side to null (unless already changed)
            if ($recipeHasIngredient->getIngredientGroup() === $this) {
                $recipeHasIngredient->setIngredientGroup(null);
            }
        }

        return $this;
    }
}
