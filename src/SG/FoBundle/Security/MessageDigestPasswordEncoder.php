<?php
namespace SG\FoBundle\Security;

use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder as BaseMessageDigestPasswordEncoder;

class MessageDigestPasswordEncoder extends BaseMessageDigestPasswordEncoder
{
    public $algorithm;
    public $encodeHashAsBase64;
    
    public function __construct($algorithm = 'sha1', $encodeHashAsBase64 = true, $iterations = 0) 
    {
        $this->algorithm = $algorithm;
        $this->encodeHashAsBase64 = $encodeHashAsBase64;
    }
    
    protected function mergePasswordAndSalt($pass, $salt)
    {
        if (empty($salt)) {
            return $pass;
        }
        return $pass.$salt; 
    }
    
    public function encodePassword($raw, $salt) {
        if (!in_array($this->algorithm, hash_algos(), false)) {
            $error = "Not a supporting encoding: ".$this->algorithm;
        }
        $salted = $this->mergePasswordAndSalt($raw, $salt);
        $digest = hash($this->algorithm, $salted, TRUE);
        return $this->encodeHashAsBase64 ? base64_encode($digest) : bin2hex($digest);
    }
}
