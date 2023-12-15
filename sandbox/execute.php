<?php
declare(strict_types=1);

/**
 * SignNow Api
 * Sandbox PHP SDK script
 */

require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Using this file as sandbox script:
 *
 * 1. Create your sandbox environment at
 *    https://www.signnow.com/developers
 *
 * 2. Log in SignNow
 *
 * 3. Enter your secrets below
 *    as it is shown at
 *    https://docs.signnow.com/sn/account/#dashboard
 *
 * 4. Execute the script from project root directory in console:
 *    php sandbox/execute.php
 */

const HOST = 'https://api-eval.signnow.com';
const BASIC_TOKEN = 'YOUR_BASIC_TOKEN';
const USER = 'YOUR_USER';
const PASSWORD = 'YOUR_PASSWORD';
const DOWNLOADED_DIRECTORY_PATH = '/path/to/dir';

use SignNow\Api\Action\Data\Document\DownloadType;
use SignNow\Api\Action\OAuth as SignNowOAuth;
use SignNow\Api\Action\Document;
use SignNow\Api\Action\Data\Document\DocumentDownloadLinkParams;
use SignNow\Api\Action\Data\Document\GetDocumentRequestParams;

try {
    $auth = new SignNowOAuth(HOST);
    $document = new Document(
        $auth->bearerByPassword(BASIC_TOKEN, USER, PASSWORD)
    );

    // 1. Upload a doc
    $documentEntity = $document->upload(dirname(__DIR__) . '/tests/_data/blank.pdf');
    echo 'Uploaded the document: ', $documentEntity->getId(), PHP_EOL, PHP_EOL;

    usleep(500);

    // 2. Get the doc
    $params = (new GetDocumentRequestParams())
        ->setExclude(
            [
                'checks'
            ]
        )
        ->setInclude(
            [
                'routing_details',
                'document_group_template_info'
            ]
        )
        ->setWithData()
        ->setWithAnnotation();
    $documentEntity = $document->get($documentEntity->getId(), $params);
    echo 'Given document name: ', $documentEntity->getDocumentName(), PHP_EOL, PHP_EOL;

    sleep(2);

    // 3. Create download link
    $link = $document->createDownloadLink($documentEntity->getId());
    echo 'Download link: ', $link->getLink(), PHP_EOL, PHP_EOL;

    sleep(2);

    // 4. Download the doc
    $path = DOWNLOADED_DIRECTORY_PATH . '/sign_now_downloaded_document.pdf';
    $params = (new DocumentDownloadLinkParams())
        ->setType(DownloadType::COLLAPSED)
        ->setWithHistory();
    $file = $document->download(
        $documentEntity->getId(),
        $params
    );
    file_put_contents($path, $file->getContent());
    echo 'Downloaded the document in ', $path, PHP_EOL, PHP_EOL;

    sleep(2);

    // 5. Delete the doc
    $document->delete($documentEntity->getId());
    echo 'Deleted the document ', $documentEntity->getId(), PHP_EOL, PHP_EOL;
} catch (Throwable $exception) {
    echo 'ERROR [SignNow API]: ' . $exception->getMessage(), PHP_EOL;
}
