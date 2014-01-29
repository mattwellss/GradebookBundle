<?php

namespace Mattwellss\GradebookBundle\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Entity\Course;

class DeleteCommand extends BaseCommand
{
    protected function configure()
    {
        $this
            ->setName('gradebook:delete')
            ->setDescription('Delete a gradebook item')
            ->addArgument('entity', InputArgument::REQUIRED, 'Entity to delete')
            ->addArgument('id', InputArgument::REQUIRED, 'Id of course');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entity = $this->doctrine->getManager()
                            ->getRepository('MattwellssGradebookbundle:' . $input->getArgument('entity'))
                                ->find($input->getArgument('id'));

        $mgr = $this->doctrine->getManager();

        $mgr->remove($entity);
        $mgr->flush();

    }
}
