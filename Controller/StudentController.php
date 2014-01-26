<?php

namespace Mattwellss\GradebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Mattwellss\GradebookBundle\Entity\Student;

class StudentController extends Controller
{
    public function listAction()
    {
        $students = $this->get('doctrine')
                            ->getRepository('MattwellssGradebookBundle:Student')
                                ->findAll();

        return $this->render('MattwellssGradebookBundle:Student:all.html.twig',
            ['students' => $students]);
    }

    public function getStudentAction($studentId)
    {
        $student = $this->get('doctrine')
                            ->getRepository('MattwellssGradebookBundle:Student')
                                ->find($studentId);
        return $this->render('MattwellssGradebookBundle:Student:one.html.twig',
            ['student' => $student]);
    }
}
