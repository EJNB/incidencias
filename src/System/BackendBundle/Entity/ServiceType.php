<?php

namespace System\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServiceType
 *
 * @ORM\Table(name="service_type")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\ServiceTypeRepository")
 */
class ServiceType
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
     * @var int
     *
     * @ORM\Column(name="code", type="string", length=20)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="ItemType", inversedBy="services_types")
     * @ORM\JoinColumn(name="itemtype_id", referencedColumnName="id")
     **/
    private $itemtype;

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
     * Set code
     *
     * @param integer $code
     * @return ServiceType
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ServiceType
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

    /**
     * Set itemtype
     *
     * @param \System\BackendBundle\Entity\ItemType $itemtype
     * @return ServiceType
     */
    public function setItemtype(\System\BackendBundle\Entity\ItemType $itemtype = null)
    {
        $this->itemtype = $itemtype;

        return $this;
    }

    /**
     * Get itemtype
     *
     * @return \System\BackendBundle\Entity\ItemType 
     */
    public function getItemtype()
    {
        return $this->itemtype;
    }
}
