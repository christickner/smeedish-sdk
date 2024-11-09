<?php

namespace Smeed;

/**
 * Smeedish Encryption/Decryption SDK
 * 
 * Encrypts and decrypts text according to the Smeedish algorithm
 * 
 * Example Usage:
 *  $inputText = "hello world";
 *  $encryptedText = Smeedish::encrypt($inputText);
 *  $decryptedText = Smeedish::decrypt($encryptedText);
 *  echo "Encrypted: $encryptedText\n";
 *  echo "Decrypted: $decryptedText\n";
 */

class Smeedish {

    // Method to encrypt text
    public static function encrypt($inputText) {
        // Step 1: Remove non-lowercase letters
        $inputText = self::removeNonLowercase($inputText);
        
        // Step 2: Strip excessive whitespace (remove extra spaces between words)
        $inputText = self::stripWhitespace($inputText);
        
        // Step 3: Insert random characters at random positions
        $inputText = self::insertRandomCharacters($inputText);
        
        // Return the final encrypted "smeedish" text
        return $inputText;
    }

    // Method to decrypt text
    public static function decrypt($inputText) {
        // Step 1: Remove random characters (non-alphabetic characters inserted during encryption)
        $inputText = self::removeRandomCharacters($inputText);
        
        // Step 2: Restore excessive whitespace (remove extra spaces between words)
        $inputText = self::stripWhitespace($inputText);
        
        // Step 3: Ensure text is all lowercase (to account for any uppercase in the encryption process)
        $inputText = strtolower($inputText);
        
        // Return the final decrypted text
        return $inputText;
    }

    // Remove all non-lowercase letters
    private static function removeNonLowercase($text) {
        // Only keep lowercase letters and spaces
        return preg_replace('/[^a-z\s]/', '', $text);
    }

    // Strip excessive whitespace (convert multiple spaces to a single space)
    private static function stripWhitespace($text) {
        // Replace multiple spaces with a single space
        return preg_replace('/\s+/', ' ', $text);
    }

    // Insert random characters at random intervals
    private static function insertRandomCharacters($text) {
        $length = strlen($text);
        $output = '';
        
        // Traverse the string and insert random characters at random intervals
        for ($i = 0; $i < $length; $i++) {
            // Add the original character
            $output .= $text[$i];
            
            // Randomly insert a special character after each character
            if (rand(0, 2) === 0) {  // 1 in 3 chance to insert a random character
                $output .= self::randomCharacter();
            }
        }
        
        return $output;
    }

    // Remove all random characters that were inserted during encryption
    private static function removeRandomCharacters($text) {
        // Remove anything that's not a lowercase letter or a space
        return preg_replace('/[^a-z\s]/', '', $text);
    }

    // Generate a random character from a set of special symbols and digits
    private static function randomCharacter() {
        $characters = '!@#$%^&*()_+=-[]{}|;:,.<>?/1234567890';
        return $characters[rand(0, strlen($characters) - 1)];
    }
}
