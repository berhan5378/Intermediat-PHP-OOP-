<?php
/*
HTTP Headers In PHP - Request & Response Headers
HTTP headers are an essential part of web communication, allowing clients (e.g., browsers) and servers to exchange additional information along with the request or response. 
In PHP, you can work with both request headers (sent by the client) and response headers (sent by the server)

getallheaders() returns an associative array of all HTTP request headers.
Specific headers can be accessed using $_SERVER with the prefix HTTP_ (e.g., HTTP_USER_AGENT for the User-Agent header).
*/

// Get all request headers
$headers = getallheaders();
//echo '<pre>';
//print_r($headers);
//echo '<pre>'; 
 
// Array
//(
//    [Accept-Language] => en-US,en;q=0.9
//    [Accept-Encoding] => gzip, deflate, br, zstd
//    [Sec-Fetch-Dest] => document
//    [Sec-Fetch-User] => ?1
//    [Sec-Fetch-Mode] => navigate
//    [Sec-Fetch-Site] => none
//    [Accept] => text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
//    [User-Agent] => Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Mobile Safari/537.36
//    [Upgrade-Insecure-Requests] => 1
//    [Sec-Ch-Ua-Platform] => "Android"
//    [Sec-Ch-Ua-Mobile] => ?1
//    [Sec-Ch-Ua] => "Not A(Brand";v="8", "Chromium";v="132", "Google Chrome";v="132"
//    [Cache-Control] => max-age=0
//    [Connection] => keep-alive
//    [Host] => localhost:8000
//    [Content-Length] => 
//    [Content-Type] => 
//)

// Access specific headers
$userAgent = $_SERVER['HTTP_USER_AGENT']; // User-Agent header
$acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE']; // Accept-Language header

//echo "User-Agent: $userAgent\n";
//echo "Accept-Language: $acceptLanguage\n";
/*
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36
Accept-Language: en-US,en;q=0.9
*/

/*
Response Headers
Response headers are sent by the server to the client. In PHP, you can set these headers using the header() function.
*/



/*
// Set a single response header
header("Content-Type: application/json");

// Set a custom header
header("X-Custom-Header: Hello, World!");

// Set a redirect header
header("Location: example.php");


// Set multiple headers
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
exit; // Always exit after a redirect
*/

/*
Checking if Headers Have Been Sent
Before sending headers, you can check if headers have already been sent using the headers_sent() function
*/
if (!headers_sent()) {
   // header("X-Custom-Header: Hello, World!");
} else {
    echo "Headers already sent!";
}
//Setting Content Type

//header("Content-Type: application/json");
//echo json_encode(["message" => "Hello, World!"]);

//Forcing File Download
//header("Content-Type: application/octet-stream");
//header("Content-Disposition: attachment; filename=\"example.php\"");
//readfile("example.php");

ob_start(); // Start output buffering
echo 'before header';
// Some code that might send headers
header("X-Custom-Header: Hello, World!");

ob_end_flush(); // Send output and headers

//Accessing a Custom Header
$customHeader = $_SERVER['HTTP_X_CUSTOM_HEADER'] ?? null;
echo "Custom Header: $customHeader";