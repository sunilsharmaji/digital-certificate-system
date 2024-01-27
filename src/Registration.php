<?php

// Define a class named Registration to manage student registration and retrieval.
class Registration {

    // Array to store student records
    public $students = [];

    // Static variable to keep track of the last student ID
    public static $lastStudentId = 0;

    // Method to register a new student
    public function register() {

        // Prompt the user to enter student details
        $name = $this->promptInput("Enter name");
        $email = $this->promptInput("Enter email");
        $age = $this->promptInput("Enter age");
        $course = "";

        // Prompt the user to enter a valid course
        while (!in_array($course, ['math', 'english', 'politics'])) {
            $course = strtolower($this->promptInput("Enter course (math, english, politics)"));
        }

        // Increment the last student ID and add the student to the students array
        self::$lastStudentId += 1;
        $this->students[] = ["student_id" => self::$lastStudentId, "name" => $name, "email" => $email, "age" => $age, "course" => $course];

        // Inform the user about the successful registration
        echo "\nStudent registered successfully:\n";
    }

    // Method to retrieve a student based on their ID
    public function getStudent($student_id) {
        if (empty($this->students)) {
            echo "Students list is empty. Please add a student.";
            return;
        }

        // Filter the students array to find the matching student ID
        $records = array_filter($this->students, function($item) use ($student_id) {
            return $item["student_id"] == $student_id;
        }, ARRAY_FILTER_USE_BOTH);

        // If no record found, inform the user
        if (empty($records)) {
            echo "Student is not found.";
            return;
        }
        // Return the first matching record
        return current($records);
    }

    // Private method to prompt user input
    private function promptInput($prompt) {
        echo $prompt . ": ";
        return trim(fgets(STDIN));
    }

    // Method to display all registered students
    public function displayStudents() {
        $this->printTable($this->students);
    }

    // Function to print a row of data
    private function printRow($row) {
        foreach ($row as $item) {
            // Adjust the width to align columns properly
            printf("%-25s", $item);
        }
        echo "\n";
    }

    // Function to print the table
    private function printTable($data) {
        // Cast $data to an array
        $data = (array) $data;
        // Get the header row
        $header = array_keys($data[0]);
        // Print the header
        $this->printRow($header);

        // Print data rows
        foreach ($data as $row) {
            $this->printRow($row);
        }
    }
}

?>
