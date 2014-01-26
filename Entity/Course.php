<?php

namespace Mattwellss\GradebookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="course")
 * Course
 */
class Course
{

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=128)
     */
    protected $name;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Mattwellss\GradebookBundle\Entity\Grade", mappedBy="course", cascade={"persist", "remove"})
     */
    protected $grades;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return sprintf('%d %s', 
            $this->getId(), $this->getName());
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
     * @return Course
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
     * Add grades
     *
     * @param \Mattwellss\GradebookBundle\Entity\Grade $grades
     * @return Course
     */
    public function addGrade(\Mattwellss\GradebookBundle\Entity\Grade $grades)
    {
        $this->grades[] = $grades;

        return $this;
    }

    /**
     * Remove grades
     *
     * @param \Mattwellss\GradebookBundle\Entity\Grade $grades
     */
    public function removeGrade(\Mattwellss\GradebookBundle\Entity\Grade $grades)
    {
        $this->grades->removeElement($grades);
    }

    /**
     * Get grades
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrades()
    {
        return $this->grades;
    }
}
