<?php

namespace Mattwellss\GradebookBundle\Command;

abstract class WriteCommand extends BaseCommand
{
    protected function persist($entity)
    {
        $orm = $this->doctrine->getManager();
        $orm->persist($entity);
        $orm->flush();
    }
}
