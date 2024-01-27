<?php
// Declare strict typing to enforce type safety throughout the code.
declare(strict_types=1);

// Require the autoload file to autoload necessary classes.
require __DIR__.'/../vendor/autoload.php';

// Require the KeyGenerator class file.
require_once("KeyGenerator.php");

// Import necessary classes from the Lcobucci JWT library.
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\Token\Builder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Validator;
use Lcobucci\JWT\Validation\Constraint\SignedWith;

// Define a class named Certificate to manage certificate issuance and verification.
class Certificate {
    // Constant representing the issuer of the certificates.
    const ISSUER = "TechEd Academy";

    // Array to store issued certificates.
    private $certificates = [];

    // Method to issue a certificate to a student.
    public function issueCertificate($student) {
        // Check if the student data is empty.
        if(empty($student)) {
            return;
        }

        // Define the verifiable credential data.
        $credentialData = [
            '@context' => [
                'https://www.w3.org/2018/credentials/v1',
                'https://www.techedacademy.com/context/v1', 
            ],
            'type' => ['VerifiableCredential', 'CourseCompletionCredential'],
            'issuer' => self::ISSUER,
            'issuanceDate' => date('Y-m-d H:i:s'),
            'credentialSubject' => [
                'id' => $this->generateDID(),
                'student_name' => $student['name'],
                'course_name' => $student['course'],
                'age' => $student['age'],
                'email' => $student['email'],
                'completion_date' => date('Y-m-d H:i:s'),
            ],
        ];

        // Generate a new RSA key pair.
        $keyGenerator = new KeyGenerator;
        $keyGenerator->generate();
        $private = $keyGenerator->getPrivateKey();
        $public = $keyGenerator->getPublicKey();
        $signingKey = InMemory::plainText($private);

        // Build the JWT token with the verifiable credential data.
        $tokenBuilder = (new Builder(new JoseEncoder(), ChainedFormatter::default()));
        $algorithm = new Sha256();
        $token = $tokenBuilder->withClaim('vc', $credentialData)->getToken($algorithm, $signingKey);
        $token = $token->toString();

        // Store the certificate along with its public key and verifiable credential data.
        $this->certificates[] = ["token" => $token, "public_key" => $public, "vc" => $credentialData];
        
        // Output the token.
        echo $token;
        return $token;
    }

    // Method to verify the authenticity of a certificate token.
    public function verifyCertificate($token) {
        // Retrieve the certificate corresponding to the provided token.
        $certificate = $this->getCertificate(trim($token));
        if(empty($certificate)) return;

        // Extract the public key from the certificate.
        $publicKey = InMemory::plainText($certificate["public_key"]);

        // Parse the JWT token.
        $parser = new Parser(new JoseEncoder());
        $parsed_token = $parser->parse($token);

        // Define the signer and validator.
        $signer = new Sha256();
        $validator = new Validator();

        // Validate the token signature.
        if ($validator->validate($parsed_token, new SignedWith($signer, $publicKey))) {
            echo "\nVerification successful!";
        } else {
            echo "\nVerification failed!";
        }
    }

    // Method to generate a Decentralized Identifier (DID).
    private function generateDID() {
        // Generate a UUID (Universally Unique Identifier).
        $uuid = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        // Construct the DID using the DID:UUID method.
        $did = 'did:uuid:' . $uuid;

        return  $did;
    }

    // Method to retrieve a certificate based on its token.
    private function getCertificate($token) {
        // Check if the certificate list is empty.
        if(empty($this->certificates)) {
            echo "Certificate list is empty. Please add a certificate.";
            return;
        }

        // Filter the certificates array to find the matching token.
        $records = array_filter($this->certificates, function($val) use ($token) {
            return $val["token"] == $token;
        }, ARRAY_FILTER_USE_BOTH);

        // Check if the certificate is found.
        if(empty($records)) {
            echo "Certificate is not found.";
            return;
        }

        // Return the first matching certificate.
        return current($records);
    }
}
?>
