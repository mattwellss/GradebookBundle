<?php

namespace Mattwellss\GradebookBundle\Command\Add;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Mattwellss\GradebookBundle\Command\WriteCommand;
use Mattwellss\GradebookBundle\Entity\Student;

class StudentCommand extends WriteCommand
{

    const FRIENDLY_FORMAT = 'YYYY-MM-DD';
    protected function configure()
    {
        $this
            ->setName('gradebook:add:student')
            ->setDescription('Add a student')
            ->addArgument('first_name', InputArgument::REQUIRED, 'Student\'s first name')
            ->addArgument('last_name', InputArgument::REQUIRED, 'Student\'s last name')
            ->addArgument('birthdate', InputArgument::REQUIRED, "Student's date of birth ({static::FRIENDLY_FORMAT})")
            ->setHelp(<<<HELP
The <info>add</info> command is used to add a student to the record
HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!($birthdate = \DateTime::createFromFormat('Y-m-d', $input->getArgument('birthdate')))) {
            $output->writeln("Please ensure the date format is {static::FRIENDLY_FORMAT} and is also a valid date.");
            return;
        }

        $output->writeln(sprintf('creating a student: %s %s, born %s',
            $input->getArgument('first_name'),
            $input->getArgument('last_name'),
            $birthdate->format('M j Y')));

        $student = new Student;
        $student->setFirstName($input->getArgument('first_name'));
        $student->setLastName($input->getArgument('last_name'));
        $student->setBirthdate($birthdate);

        $this->persist($student);

        $output->writeln('Successfully created student (id: ' . $student->getId() . ')');
    }
}
