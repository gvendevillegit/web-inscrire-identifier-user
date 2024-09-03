<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $to, string $subject, string $content): void
    {
        $email = (new Email())
            ->from('your_email@example.com')
            ->to($to)
            ->subject($subject)
            ->text($content)
            ->html('<p>' . $content . '</p>');

        $this->mailer->send($email);
    }

    // public function send(
    //     string $from,
    //     string $to,
    //     string $subject,
    //     string $template,
    //     array $context
    // ): void
    // {
    //     // On crée le mail
    //     $email = (new TemplatedEmail())
    //         ->from($from)
    //         ->to($to)
    //         ->subject($subject)
    //         ->htmlTemplate("emails/$template.html.twig")
    //         ->context($context);

    //     // On envoie le mail
    //     $this->mailer->send($email);
    // }
}
