<?php

namespace App\Controller;

use App\Form\EmailFormType;
use App\Service\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmailController extends AbstractController
{
    private $mailerService;

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }
    
    #[Route('/email', name: 'app_email')]
    public function index(): Response
    {
        return $this->render('email/index.html.twig', [
            'controller_name' => 'EmailController',
        ]);
    }

    #[Route('/send-email', name: 'app_send_email')]
    public function sendEmail(Request $request): Response
    {
        $form = $this->createForm(EmailFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $this->mailerService->sendEmail(
                $data['recipient'],
                $data['subject'],
                $data['message'],
                'https://example.com/action',  // Peut être modifié ou rendu dynamique selon le besoin
                'Click here'  // Peut être modifié ou rendu dynamique selon le besoin
            );

            $this->addFlash('success', 'Email sent successfully!');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('email/send_email.html.twig', [
            'email_form' => $form->createView(),
        ]);
    }
}
