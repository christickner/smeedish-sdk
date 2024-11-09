Smeedish currently only supports PHP but with plans to add a golang SDK shortly after on this repository.

```php
// Example of using the SDK

$inputText = "hello world";
$encryptedText = Smeedish::encrypt($inputText);
$decryptedText = Smeedish::decrypt($encryptedText);

echo "Original: $inputText\n";
echo "Encrypted: $encryptedText\n";
echo "Decrypted: $decryptedText\n";
```
