Gradebook Bundle
===============

A simple Symfony 2 bundle for tracking student grades

## Commands

### Add a Student
`gradebook:add:student`

Use this command to create a student for your Grade Book. It takes three parameters: first name, last name, and date of birth (YYYY-MM-DD format)

### Add a Course
`gradebook:add:course`

Use this command to add a course to your Grade Book. It takes just one parameter: name.

### Grade a student
`gradebook:set:grade`

Use this command to grade a student on an existing course. Parameters: grade (two characters), `--course_id`, and `--student_id`.

### List them
`gradebook:list`

Use this command to view all of any item: `grade`, `student` and `course` are all acceptable options.
