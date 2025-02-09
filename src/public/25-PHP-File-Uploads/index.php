<?php
/*
PHP File Uploads

File uploads in PHP allow users to upload files from their local machine to a server. 
PHP provides built-in functionality to handle file uploads, but it requires careful handling to ensure security and proper functionality.


Key Elements of $_FILES
The $_FILES superglobal is an associative array that contains the following keys for each uploaded file:

name: The original name of the file.
tmp_name: The temporary path of the file on the server.
size: The size of the file in bytes.
type: The MIME type of the file (e.g., image/jpeg).
error: The error code associated with the file upload.


Handling Errors
The error key in $_FILES provides information about any issues during the upload process. Common error codes include:
UPLOAD_ERR_OK (0): No error; the file was uploaded successfully.
UPLOAD_ERR_INI_SIZE (1): The file exceeds the upload_max_filesize directive in php.ini.
UPLOAD_ERR_FORM_SIZE (2): The file exceeds the MAX_FILE_SIZE directive in the HTML form.
UPLOAD_ERR_PARTIAL (3): The file was only partially uploaded.
UPLOAD_ERR_NO_FILE (4): No file was uploaded.
UPLOAD_ERR_NO_TMP_DIR (6): Missing a temporary folder.
UPLOAD_ERR_CANT_WRITE (7): Failed to write the file to disk.
*/

/*
step1 
Create an HTML Form:
Use an HTML form with the enctype="multipart/form-data" attribute to allow file uploads.
*/
echo '
<form action="" method="post" enctype="multipart/form-data">
    <label for="file">Choose file:</label>
    <input type="file" name="file" id="file">
    <input type="submit" value="Upload">
</form>
';
/*
step2
Handle the Upload in PHP:
Use the $_FILES superglobal to access the uploaded file's information.
*/
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];

        // File details
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        // Move the file to a permanent location
        $uploadDir = 'uploads/';
        $uploadPath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            echo "File uploaded successfully!";
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}

//Handling Errors
if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
    switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_INI_SIZE:
            echo "The file is too large.";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "No file was uploaded.";
            break;
        default:
            echo "An error occurred during upload.";
    }
}

/*
Validate File Types:

Check the file's MIME type and extension to ensure it matches the expected type.
*/
$allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
if (!in_array($_FILES['file']['type'], $allowedTypes)) {
    die("Invalid file type.");
}
/*
Limit File Size:

Restrict the maximum file size to prevent abuse.
*/
$maxSize = 5 * 1024 * 1024; // 5 MB
if ($_FILES['file']['size'] > $maxSize) {
    die("File is too large.");
}

/*
Sanitize File Names:

Rename uploaded files to prevent directory traversal attacks or overwriting existing files.
*/
$fileName = uniqid() . '_' . basename($_FILES['file']['name']);
//Use Secure Upload Directories:
//Store uploaded files outside the web root or restrict access to the upload directory.

/*
Multiple File Uploads:

Use the multiple attribute in the HTML form to allow multiple file uploads.
*/
echo '<input type="file" name="files[]" multiple>';
foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
    $fileName = $_FILES['files']['name'][$key];
    move_uploaded_file($tmpName, 'uploads/' . $fileName);
}
/*

Progress Tracking:

Use the session.upload_progress feature in PHP to track file upload progress.
*/
ini_set('session.upload_progress.enabled', 1);
session_start();

//Complete File Upload Script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['file'];

        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/png'];
        if (!in_array($file['type'], $allowedTypes)) {
            die("Invalid file type.");
        }

        // Validate file size
        $maxSize = 5 * 1024 * 1024; // 5 MB
        if ($file['size'] > $maxSize) {
            die("File is too large.");
        }

        // Sanitize file name
        $fileName = uniqid() . '_' . basename($file['name']);

        // Move the file to the upload directory
        $uploadDir = 'uploads/';
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            echo "File uploaded successfully!";
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {
        echo "Error uploading file.";
    }
}
