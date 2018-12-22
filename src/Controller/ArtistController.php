<?php

namespace App\Controller;

use App\Service\ArtistService;
use Core\Factories\RequestFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * Get list of articles in database.
     *
     * @Route("/artists", name="artist")
     *
     * @param Request $request
     * @param ArtistService $service
     * @return JsonResponse
     */
    public function index(Request $request, ArtistService $service)
    {
        $data = $request->query->all();

        $request = (new RequestFactory())->create($data);

        return new JsonResponse($service->index($request)->toArray([
            'attributes' => [
                'name', 'token', 'albums' => ['title', 'cover', 'token']
            ]
        ]));
    }

    /**
     * Get artist by token.
     *
     * @Route("/artists/{token}", name="artist-by-token")
     * @param Request $request
     * @param ArtistService $service
     * @return JsonResponse
     */
    public function getByToken(Request $request, ArtistService $service)
    {
        $request = (new RequestFactory())->create(['token' => $request->get('token')]);

        return new JsonResponse($service->show($request)->toArray([
            'attributes' => [
                'name', 'token', 'albums' => ['title', 'cover', 'token']
            ]
        ]));
    }
}
