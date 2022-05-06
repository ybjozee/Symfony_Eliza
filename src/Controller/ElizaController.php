<?php

namespace App\Controller;

use App\Model\Eliza;
use App\Service\WhatsAppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElizaController extends AbstractController {

    #[Route('/eliza', name: 'app_eliza', methods: ['POST'])]
    public function index(Request $request, WhatsAppService $whatsApp)
    : Response {

        $recipient = $request->request->get('From');
        $userInput = $request->request->get('Body');

        $whatsApp->send(Eliza::respondTo($userInput), $recipient);

        return $this->json(null, Response::HTTP_NO_CONTENT);
    }
}
