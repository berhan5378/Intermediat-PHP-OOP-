<?php
/*
PHP Sessions & Cookies - Output Buffering - Headers Already Sent Warning 
you might encounter the "Headers Already Sent" warning. This typically happens when you try to send HTTP headers (e.g., using session_start(), setcookie(), or header()) after output has already been sent to the browser. 
PHP requires that headers be sent before any content, so this warning is a safeguard to ensure proper HTTP protocol.


Common Causes of "Headers Already Sent" Warning
Whitespace or Output Before <?php or After ?>: Even a single space or line break before <?php or after ?> in a PHP file can cause output to be sent prematurely.

Included Files: If you include or require files that contain whitespace or output, it can trigger this warning.

UTF-8 BOM: Some text editors add a Byte Order Mark (BOM) to UTF-8 files, which can cause output to be sent before headers.

Echo or Print Statements: Any echo, print, or HTML output before calling functions like session_start() or header() will cause this issue.
*/

/*
//Ensure that functions like session_start(), setcookie(), and header() are called before any output.
session_start(); // Correct: Before any output
echo "Hello, World!";
*/

/*
Using Output Buffering
Output buffering is a powerful feature in PHP that allows you to capture all output (e.g., echo, print, HTML) and send it to the browser at once. 
This can help avoid "Headers Already Sent" errors.

<?php
ob_start(); // Start output buffering

// Your code here
session_start();
setcookie("username", "JohnDoe", time() + 3600);
echo "Hello, World!";

ob_end_flush(); // Send the output to the browser
*/

/*
Debugging Tips
Enable Error Reporting:

Use error_reporting(E_ALL) and ini_set('display_errors', 1) to see all errors and warnings.
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

*/

/*
Check for Output:

Use headers_sent($file, $line) to identify where output is being sent.

<?php
if (headers_sent($file, $line)) {
    echo "Headers already sent in $file on line $line.";
} else {
    session_start();
}
    */