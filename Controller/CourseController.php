<?php

namespace Mattwellss\GradebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Mattwellss\GradebookBundle\Entity\Course;

class CourseController extends Controller
{
    public function listAction()
    {
        $courses = $this->get('doctrine')
                            ->getRepository('MattwellssGradebookBundle:Course')
                                ->findAll();

        return $this->render('MattwellssGradebookBundle:Course:all.html.twig',
            ['courses' => $courses]);
    }

    public function getCourseAction($courseId)
    {
        $course = $this->get('doctrine')
                            ->getRepository('MattwellssGradebookBundle:Course')
                                ->find($courseId);
        return $this->render('MattwellssGradebookBundle:Course:one.html.twig',
            ['course' => $course]);
    }
}
