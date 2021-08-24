<?php

namespace App\MessageHandler;

use App\Message\DownloadLogo;
use Aws\S3\S3Client;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class DownloadLogoHandler implements MessageHandlerInterface
{
    public function __construct(
        private S3Client $s3Client,
        private string $awsBucket
    )
    {
    }

    public function __invoke(DownloadLogo $downloadLogo)
    {
        $this->s3Client->putObject(
            [
                'Bucket' => $this->awsBucket,
                'Key' => strtolower($downloadLogo->getLogo()->getName()) . '.svg',
                'ContentType' => 'image/svg_xml',
                'Body' => $downloadLogo->getLogo()->getFileContext(),
                'ACL' => 'public-read'
            ]
        );
    }

}
