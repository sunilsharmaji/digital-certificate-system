<?php
// Require necessary class files
require_once("Registration.php");
require_once("Certificate.php");

// Define a class named Application to manage the digital certificate issuance system
class Application {
    
    // Private properties to hold instances of Registration and Certificate classes
    private $registration;
    private $certificate;

    // Constructor method to initialize the application
    public function __construct(){

        // Create instances of Registration and Certificate classes
        $this->registration = new Registration(); 
        $this->certificate = new Certificate(); 

        // Welcome message for the application
        echo "\n";
        echo "## Welcome to the Digital Certificate Issuance System of TechEd Academy ##\n".PHP_EOL;
        echo "Please select an operation.".PHP_EOL;
        echo "1. Register a student.".PHP_EOL;
        echo "2. Display registered students.\n";
        echo "3. Issue a digital certificate.".PHP_EOL;
        echo "4. Verify a certificate.".PHP_EOL;
        echo "5. Exit.".PHP_EOL;

        // Continuous loop to prompt for operations
        while(true){
            echo "\n";
            $operation = $this->promptInput("Enter operation number.");
            echo "\n";
            $this->operations($operation);
        }
    }

    // Private method to prompt user input
    private function promptInput($prompt) {
        echo $prompt . ": ";
        return trim(fgets(STDIN));
    }

    // Method to perform different operations based on user input
    private function operations(int $operation){
        switch ($operation) {
            case 1:
                $this->registration->register();
                break;
            case 2:
                $this->registration->displayStudents();
                break;
            case 3:
                $student_id = $this->promptInput("Enter student Id");
                $student = $this->registration->getStudent($student_id);
                $this->certificate->issueCertificate($student);
                break;
            case 4:
                $token = $this->promptInput("Enter digital certificate token");
                $this->certificate->verifyCertificate($token);
                break;
            case 5:
                exit();
                break;
            default:
                echo "Wrong input!\n";
                break;
        }
    }
}

// Create an instance of the Application class to start the application
$application = new Application;
?>
