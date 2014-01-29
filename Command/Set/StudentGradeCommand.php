<?php

namespace Mattwellss\GradebookBundle\Command\Set;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Entity\Student;
use Mattwellss\GradebookBundle\Entity\Grade;
use Mattwellss\GradebookBundle\Entity\Course;
use Mattwellss\GradebookBundle\Command\WriteCommand;

class StudentGradeCommand extends WriteCommand
{
    protected function configure()
    {
        $this
            ->setName('gradebook:set:grade')
            ->setDescription('Set a student\'s grade for a course')
            ->addOption('student_id', null, InputOption::VALUE_REQUIRED, 'id of student')
            ->addOption('course_id', null, InputOption::VALUE_REQUIRED, 'course id')
            ->addArgument('grade', InputArgument::REQUIRED, 'grade of student');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Grab the course
        $course = $this->doctrine->getRepository('MattwellssGradebookBundle:Course')
                        ->find($input->getOption('course_id'));

        if (!$course->getId()) {
            throw new \Exception('NO COURSE');
        }

        // Grab the student
        $student = $this->doctrine->getRepository('MattwellssGradebookBundle:Student')
                            ->find($input->getOption('student_id'));

        if (!$student->getId()) {
            throw new \Exception('NO STUDENT');
        }


        $grade = new Grade;

        $grade
            ->setGrade($input->getArgument('grade'))
            ->setStudent($student)
            ->setCourse($course);

        $this->persist($grade);

    }
}
