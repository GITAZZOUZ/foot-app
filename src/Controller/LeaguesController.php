<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Client\ClientFoot;
class LeaguesController extends AbstractController
{
    /**
     * @Route("/leagues", name="app_leagues")
     */
    public function index(): Response
    {
        $host = $this->getParameter('x-rapidapi-host');
        $key = $this->getParameter('x-rapidapi-key');
        $client = new ClientFoot($host, $key);
        $sites = $client->execute();

        return $this->render('leagues/index.html.twig', [
            'teams' => $sites,
        ]);
    }


    /**
     * Creates a new ActionItem entity.
     *
     * @Route("/leagues/search", name="ajax_search")
     */
    public function search(Request $request) :Response
    {
        $requestString = $request->query->all()['q'];
        $host = $this->getParameter('x-rapidapi-host');
        $key = $this->getParameter('x-rapidapi-key');
        $client = new ClientFoot($host, $key);
        $sites = $client->search($requestString);

        return new Response(json_encode($sites));
    }


    /**
     * Creates a new ActionItem entity.
     *
     * @Route("/leagues/team/{id}", name="ajax_show_team")
     */
    public function showTeam($id) :Response
    {
        $host = $this->getParameter('x-rapidapi-host');
        $key = $this->getParameter('x-rapidapi-key');
        $client = new ClientFoot($host, $key);
        $sites = $client->showTeam($id);

        return $this->render('leagues/statistics.html.twig', [
            'teams' => $sites,
        ]);
    }


}
