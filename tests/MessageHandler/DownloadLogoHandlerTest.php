<?php

namespace App\Tests\MessageHandler;

use App\Entity\Logo;
use App\Message\DownloadLogo;
use App\MessageHandler\DownloadLogoHandler;
use Aws\S3\S3Client;
use PHPUnit\Framework\TestCase;

class DownloadLogoHandlerTest extends TestCase
{
    public function testDownloadLogoHandler()
    {
        $s3Client = $this->createMock(S3Client::class);

        $logo = $this->createMock(Logo::class);

        $logo->expects(self::once())
            ->method('getFileContext');

        $downloadLogoHandler = new DownloadLogoHandler($s3Client, 'logo-bucket');

        $downloadLogoHandler(new DownloadLogo($logo));
    }

}
