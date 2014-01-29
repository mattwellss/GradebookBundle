<?php

namespace Mattwellss\GradebookBundle\Command\Add;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Command\WriteCommand;
use Mattwellss\GradebookBundle\Entity\Course;

class CourseCommand extends WriteCommand
{
    protected function configure()
    {
        $this
            ->setName('gradebook:add:course')
            ->setDescription('Add a course')
            ->addArgument('name', InputArgument::REQUIRED, 'Name of course');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $course = new Course;
        $course->setName($input->getArgument('name'));

        $this->persist($course);
    }
}
