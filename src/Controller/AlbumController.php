<?php

namespace App\Controller;

use App\Service\AlbumService;
use Core\Factories\RequestFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    /**
     * Get artist by token.
     *
     * @Route("/albums/{token}", name="album-by-token")
     * @param Request $request
     * @param AlbumService $service
     * @return JsonResponse
     */
    public function getByToken(Request $request, AlbumService $service)
    {
        $request = (new RequestFactory())->create(['token' => $request->get('token')]);

        return new JsonResponse($service->show($request)->get());
    }
}