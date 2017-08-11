<?php

namespace System\BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ItemType
 *
 * @ORM\Table(name="item_type")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\ItemTypeRepository")
 */
class ItemType
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="itemtype")
     **/
    private $items;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="itemtype")
     **/
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="ServiceType", mappedBy="itemtype")
     **/
    private $services_types;

    public function __construct() {
        $this->features = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->services_types = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ItemType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
