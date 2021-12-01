<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class DhKeyTooSmallTest extends KernelTestCase
{
    public function testDhKeyTooSmall(): void
    {
        $kernel = self::bootKernel();

        /** @var Mailer $mailerService */
        $mailerService = self::$container->get('mailer');

        $email = new Email();
        $email
            ->from('Testing McTesterson <test@email.com>')
            ->subject('This email should not send')
            ->to('Receiver of Tests <test2@email.com>')
            ->text('This is just a test.  It should not actually send.')
        ;

        $mailerService->send($email);
    }
}
