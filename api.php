<?php
/**
 * @file api.php
 *
 * Copyright (c) 2023+ TIB Hannover
 * Copyright (c) 2023+ Gazi Yucel
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class Api
 * @ingroup text-transfer-ii-prototype
 *
 * @brief API Class for handling document saving and interaction with GitHub.
 *
 */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require_once('config.php');

new Api();

exit;

class Api
{
    function __construct()
    {
        // Check if authorised
        $isAuthorised = false;

        // Check the headers for the authentication token
        foreach (getallheaders() as $key => $value) {
            if (strtolower($key) === strtolower(TOKEN_KEY)) {
                if ($value === AUTHENTICATION_TOKEN) {
                    $isAuthorised = true;
                }
            }
        }

        // Process if authorised, else respond with unauthorized status
        if ($isAuthorised) {
            $this->process();
        } else {
            $this->response(['Unauthorised'], 401);
        }
    }

    /**
     * Process request if authorised
     * @return void
     */
    private function process(): void
    {
        // // Get the POST body content from the request
        $document = file_get_contents('php://input');
        $documentA = json_decode($document, true);

        // Get action from query string and execute the corresponding method
        $action = '';
        if (!empty($_GET['action'])) $action = trim($_GET['action']);
        switch ($action) {
            case 'saveToFile':
                $this->saveToFile($documentA);
                $this->response($documentA, 200);
                break;
            case 'saveToGitHub':
                $this->saveToGitHub($documentA);
                $this->response($documentA, 200);
                break;
            default:
                $this->response(["Action '$action' not found"], 404);
                break;
        }
    }

    /**
     * Save document to file on the server.
     *
     * @param array $documentA The document data.
     * @return void
     */
    private function saveToFile(array $documentA): void
    {
        // Determine the file path for saving the document
        $filePath = '';
        if (!empty($documentA['metadata']['name'])) {
            $documentA['metadata']['name'] = $this->normalizeFileName($documentA['metadata']['name']);
            $filePath = DOCUMENTS_DIR . '/' . $documentA['metadata']['name'] . '.json';
        }

        // If document or file path is empty, respond with no content status
        if (empty($documentA) || empty($filePath))
            $this->response($documentA, 204);

        // Save the document to the specified file path
        file_put_contents($filePath, json_encode($documentA, JSON_PRETTY_PRINT));
    }

    /**
     * Save document to GitHub and to File System.
     *
     * @param array $documentA The document data.
     * @return void
     */
    private function saveToGitHub(array $documentA): void
    {
        // Initialize variables for GitHub issue ID and API URL
        $issueId = 0;
        $url = GITHUB_URL_API_ISSUES;

        // Create a Guzzle HTTP client
        $client = new Client([
            'headers' => ['User-Agent' => 'Text-Transfer-II-Prototype'],
            'verify' => false
        ]);

        try {
            // Send a POST request to GitHub API to create an issue
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

            // Parse the response to extract the GitHub issue number
            foreach ((array)$response as $key => $value) {
                if (stristr($key, 'stream')) {
                    $objValue = json_decode($value, true);

                    if (is_numeric($objValue['number'])) {
                        $issueId = (int)$objValue['number'];
                    }
                }
            }

            // Update the document metadata with the GitHub issue URL and save to file
            $documentA['metadata']['github'] = GITHUB_URL_ISSUES . $issueId;
            $this->saveToFile($documentA);

            // Respond with the GitHub issue ID
            $this->response(['issueId' => $issueId], 200);
        } catch (GuzzleException|\Exception $ex) {
            // Respond with an error if an exception occurs during the request
            $this->response(['error' => $ex->getMessage()], 500);
        }
    }

    /**
     * Respond with the appropriate HTTP status code and data.
     *
     * @param array|string $data The response data.
     * @param int $status The HTTP status code.
     * @return void
     */
    private function response(array|string $data, int $status): void
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
     * Remove non-alphanumeric characters and double spaces from the file name.
     *
     * @param string $fileName The original file name.
     * @return string The normalized file name.
     */
    private function normalizeFileName(string $fileName): string
    {
        $fileName = preg_replace("/[^A-Za-z0-9]/", ' ', $fileName);
        $fileName = preg_replace('!\s+!', ' ', $fileName);
        return trim($fileName);
    }
}
