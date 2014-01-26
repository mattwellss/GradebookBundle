<?php

namespace Mattwellss\GradebookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="student")
 * Student
 */
class Student
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="first_name", type="string", length=128)
     */
    protected $first_name;

    /**
     * @var string
     * @ORM\Column(name="last_name", type="string", length=128)
     */
    protected $last_name;

    /**
     * @var \DateTime
     * @ORM\Column(name="birthdate", type="date")
     */
    protected $birthdate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="Mattwellss\Gradebookbundle\Entity\Grade", mappedBy="student", cascade={"persist", "remove"})
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
        return sprintf('%d %s %s, born %s',
            $this->getId(), $this->getFirstName(), $this->getLastName(), $this->getBirthdate()->format('M d, Y'));
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
     * Set first_name
     *
     * @param string $firstName
     * @return Student
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Student
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Student
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Add grades
     *
     * @param \Mattwellss\GradebookBundle\Entity\Grade $grades
     * @return Student
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
