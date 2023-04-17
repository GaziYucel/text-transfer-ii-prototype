<?php
require_once('config.php');

// check if authorised
$header = getallheaders();
if (empty($header[TOKEN_KEY]) || $header[TOKEN_KEY] !== AUTHENTICATION_TOKEN)
    response(['Unauthorised'], 401);

// save document
save();

// Save document
function save(): void
{
    $document = file_get_contents('php://input');
    $documentA = json_decode($document, true);
    $filePath = '';
    if (!empty($documentA['metadata']['name'])) {
        $documentA['metadata']['name'] = normalizeFileName($documentA['metadata']['name']);
        $filePath = DOCUMENTS_DIR . '/' . $documentA['metadata']['name'] . '.json';
    }

    if (empty($documentA) || empty($filePath))
        response($documentA, 204);

    file_put_contents($filePath, json_encode($documentA, JSON_PRETTY_PRINT));

    response($documentA, 200);
}

// Response with correct status code
function response(array|string $data, int $status): void
{
    $httpStatusCodes = HTTP_STATUS_CODES[200];
    if (key_exists($status, HTTP_STATUS_CODES))
        $httpStatusCodes = HTTP_STATUS_CODES[$status];

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    header("HTTP/1.1 $status $httpStatusCodes");
    header("Content-Type: application/json");

    if (!is_array($data)) $data = [$data];

    echo json_encode($data);

    exit;
}

// Remove non-alphanumeric characters and double spaces
function normalizeFileName(string $fileName): string
{
    return preg_replace('!\s+!', ' ',
        preg_replace("/[^A-Za-z0-9]/", ' ', $fileName));
}
