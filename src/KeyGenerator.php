<?php
// Declare strict typing to enforce type safety throughout the code.
declare(strict_types=1);

// Require the autoload file to autoload necessary classes.
require __DIR__.'/../vendor/autoload.php';

// Import the RSA class from the phpseclib3\Crypt namespace.
use phpseclib3\Crypt\RSA;

// Define a class named KeyGenerator to encapsulate key generation functionality.
class KeyGenerator {
    // Private member variables to hold the generated private and public keys.
    private $private_key = null;
    private $public_key = null;

    // Method to generate a new pair of RSA keys.
    public function generate() {
        // Create a new RSA key instance with a key size of 2048 bits.
        $rsa = RSA::createKey(2048);
        
        // Extract the private key in PKCS1 format and assign it to the private key variable.
        $this->private_key = $rsa->toString("PKCS1");
        
        // Extract the public key in PKCS8 format and assign it to the public key variable.
        $this->public_key = $rsa->getPublicKey()->toString('PKCS8');
    }

    // Method to get the generated public key.
    public function getPublicKey() {
        return $this->public_key;
    }

    // Method to get the generated private key.
    public function getPrivateKey() {
        return $this->private_key;
    }
}
?>
