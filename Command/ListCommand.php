<?php

namespace Mattwellss\GradebookBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Entity\Course;
use Mattwellss\GradebookBundle\Entity\Student;
use Mattwellss\GradebookBundle\Entity\Grade;

class ListCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('gradebook:list')
            ->setDescription('List various entities')
            ->addArgument('entity');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $repo = $this->doctrine->getRepository(sprintf('MattwellssGradebookBundle:%s',
                ucfirst($input->getArgument('entity'))));
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
            return;
        }

        $all = $repo->findAll();

        $output->writeln('Every ' . $input->getArgument('entity'));

        foreach ($all as $item) {
            $output->writeln(' - ' . $item);
        }
    }
}
