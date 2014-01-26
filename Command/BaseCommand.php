<?php

namespace Mattwellss\GradebookBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class BaseCommand extends ContainerAwareCommand
{
    protected $doctrine;

    public function setApplication(\Symfony\Component\Console\Application $application = null)
    {
        parent::setApplication($application);
        $this->doctrine = $this->getContainer()->get('doctrine');
    }
}
