<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

/**
 * Location of the saved documents
 */
const DOCUMENTS_DIR = 'documents';

/**
 * Key used in the querystring for getting saved document
 */
const DOCUMENT_URL_KEY = 'name';

/**
 *  The key of the header value, which holds the token
 */
const TOKEN_KEY = 'Authenticationtoken';

/**
 *  HTTP Status Code Descriptions
 */
const HTTP_STATUS_CODES = [
    200 => 'OK',
    204 => 'No Content',
    301 => 'Permanent Redirect',
    302 => 'Temporary Redirect',
    401 => 'Unauthorised',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    500 => 'Internal Server Error',
    503 => 'Service Unavailable'
];

const GITHUB_URL_ISSUES = 'https://github.com/TIBHannover/text-transfer-ii-prototype/issues/';

/**
 * GitHub api url where the file should be saved to
 */
const GITHUB_URL_API_ISSUES = 'https://api.github.com/repos/TIBHannover/text-transfer-ii-prototype/issues';

/**
 * Create and require the config.secrets.php file.
 *This file is ignored in git, so that secrets aren't accidentally published.
 */
if (!file_exists('config.secrets.php')) {
    $data = "<?php
/**
 * Password needed for saving to server
 */
define('AUTHENTICATION_TOKEN', '');

/**
 * GitHub Token for saving to GitHub repositories
 */
define('GITHUB_TOKEN', '');
";

    file_put_contents('config.secrets.php', $data);
}
require_once('config.secrets.php');

require_once('vendor/autoload.php');
