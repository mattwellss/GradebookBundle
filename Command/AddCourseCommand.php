<?php

namespace Mattwellss\GradebookBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Entity\Course;

class AddCourseCommand extends BaseCommand
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

        $mgr = $this->doctrine->getManager();

        $mgr->persist($course);
        $mgr->flush();

    }
}
