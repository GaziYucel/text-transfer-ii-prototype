<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require_once('config.php');

$isAuthorised = false;

// check if authorised
// Some servers change the capitalization, therefore this lower caps
foreach(getallheaders() as $key => $value){
    if (strtolower($key) === strtolower(TOKEN_KEY)){
        if($value === AUTHENTICATION_TOKEN) {
            $isAuthorised = true;
        }
    }
}
if(!$isAuthorised) response(['Unauthorised'], 401);

// get post body content
$document = file_get_contents('php://input');
$documentA = json_decode($document, true);

// get action from querystring and execute corresponding method
$action = 'saveToFile';
if (!empty($_GET['action'])) $action = trim($_GET['action']);
switch ($action) {
    case 'saveToFile':
        saveToFile($documentA);
        response($documentA, 200);
        break;
    case 'saveToGitHub':
        saveToGitHub($documentA);
        break;
    default:
        response(["Action '" . $action . "' not found"], 404);
        break;
}

/**
 * Save document to file on the server
 * @param $documentA
 * @return array $documentA
 */
function saveToFile($documentA): array
{
    $filePath = '';
    if (!empty($documentA['metadata']['name'])) {
        $documentA['metadata']['name'] = normalizeFileName($documentA['metadata']['name']);
        $filePath = DOCUMENTS_DIR . '/' . $documentA['metadata']['name'] . '.json';
    }

    if (empty($documentA) || empty($filePath))
        response($documentA, 204);

    file_put_contents($filePath, json_encode($documentA, JSON_PRETTY_PRINT));

    return $documentA;
}

/**
 * Save document to GitHub and to File System
 * @param $documentA
 * @return void
 */
function saveToGitHub($documentA): void
{
    $issueId = 0;
    $url = GITHUB_URL_API_ISSUES;

    $client = new Client([
        'headers' => ['User-Agent' => 'Text-Transfer-II-Prototype'],
        'verify' => false
    ]);

    try {
        $response = $client->request('POST', $url,
            [
                'headers' => [
                    'User-Agent' => 'Text-Transfer-II-Prototype',
                    'Accept' => 'application/vnd.github.v3+json',
                    'Authorization' => 'token ' . GITHUB_TOKEN
                ],
                'json' => [
                    'title' => $documentA['metadata']['name'],
                    'body' => json_encode($documentA, JSON_PRETTY_PRINT)
                ]
            ]);

        foreach ((array)$response as $key => $value) {

            if (stristr($key, 'stream')) {
                $objValue = json_decode($value, true);

                if (is_numeric($objValue['number'])) {
                    $issueId = (int)$objValue['number'];
                }
            }
        }

        $documentA['metadata']['github'] = GITHUB_URL_ISSUES . $issueId;
        saveToFile($documentA);

        response(['issueId' => $issueId], 200);

    } catch (GuzzleException|\Exception $ex) {
        response(['error' => $ex->getMessage()], 500);
    }
}

/**
 * Response with correct status code
 * @param array|string $data
 * @param int $status
 * @return void
 */
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

/**
 * Remove non-alphanumeric characters and double spaces
 * @param string $fileName
 * @return string
 */
function normalizeFileName(string $fileName): string
{
    $fileName = preg_replace("/[^A-Za-z0-9]/", ' ', $fileName);
    $fileName = preg_replace('!\s+!', ' ', $fileName);
    return trim($fileName);
}

exit;
