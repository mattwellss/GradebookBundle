<?php

namespace Mattwellss\GradebookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="grade")
 * Grade
 */
class Grade
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
     * @ORM\Column(name="grade", type="string", length=2)
     */
    protected $grade;

    /**
     * @var \Mattwellss\GradebookBundle\Entity\Student
     * @ORM\ManyToOne(targetEntity="Mattwellss\GradebookBundle\Entity\Student", inversedBy="grades", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="fk_student_id", referencedColumnName="id")
     */
    protected $student;

    /**
     * @var \Mattwellss\GradebookBundle\Entity\Course
     * @ORM\ManyToOne(targetEntity="Mattwellss\GradebookBundle\Entity\Course", inversedBy="grades", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="fk_course_id", referencedColumnName="id")
     */
    protected $course;

    public function __toString()
    {
        return sprintf('%d %s',
            $this->getId(), $this->getGrade());
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
     * Set grade
     *
     * @param string $grade
     * @return Grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string 
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set student
     *
     * @param \Mattwellss\GradebookBundle\Entity\Student $student
     * @return Grade
     */
    public function setStudent(\Mattwellss\GradebookBundle\Entity\Student $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Mattwellss\GradebookBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set course
     *
     * @param \Mattwellss\GradebookBundle\Entity\Course $course
     * @return Grade
     */
    public function setCourse(\Mattwellss\GradebookBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \Mattwellss\GradebookBundle\Entity\Student 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
