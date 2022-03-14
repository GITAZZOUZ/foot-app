<?php

namespace App\Client;

use App\Entity\Match;
use App\Entity\Team;
use Symfony\Component\HttpClient\HttpClient;


class ClientFoot
{
    const HOST_URI = '/v2/business/search';
    protected $logger;
    protected $key = '';
    protected $host = '';
    protected $guzzleHttpClient = null;
    protected $response = [];
    /**
     * @var $params ['org_id' => 3524 ,'country' => 'FR','page' => 1,'per_page' => 30]
     */
    protected $params = ['league' => 10 ,'season'=>2019 ];
//    protected $searchParams = ['league' => 10 ,'season'=>2019 ];

//    protected $params = ['country' => 'france' ];

    public function __construct($host, $key)
    {
        $this->host = $host;
        $this->key = $key;
        $this->guzzleHttpClient = HttpClient::create(['headers' => ['Content-Type' => 'application/json', 'x-rapidapi-key' => $this->key  ]]);
    }


    /**
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute()
    {

        try {
//            $response = $this->guzzleHttpClient->request('GET', 'https://v3.football.api-sports.io/fixtures',
//                [
//                    'query' => $this->params,
//                ]
//            );
           // $this->response = json_decode($response->getContent(), true);
            $json = file_get_contents('./leagues.json');
            $sites = json_decode($json, true);
            foreach ($sites['response'] as $fixtrures ){

                $teamHome = new Team($fixtrures['teams']['home']);
                $teamAway = new Team($fixtrures['teams']['away']);

                $goalsTeamHome = $fixtrures['goals']['home'];
                $goalsTeamAway = $fixtrures['goals']['away'];
                $id = $fixtrures['fixture']['id'];

                $winner = $goalsTeamAway > $goalsTeamAway ? $teamAway : $teamHome ;

                $match = new Match($id,$teamHome,$teamAway,$goalsTeamHome,$goalsTeamAway , $winner);
                $a[] = $match;
            }
            return $a;
            //return $this->response;

        } catch (Exception $e) {
            $this->logger->error(
                '[partoo-request-get-exception] Request Exception',
                [
                    'exception' => $e->getMessage(),
                ]
            );
            return [];
        }
    }


    public function search($requestString)
    {

        try {
//            $response = $this->guzzleHttpClient->request('GET', 'https://v3.football.api-sports.io/teams',
//                [
//                    'search' => $requestString,
//                ]
//            );
            // $this->response = json_decode($response->getContent(), true);
            $json = file_get_contents('./teams.json');
            $sites = json_decode($json, true);
            foreach ($sites['response'] as $team ){

                $name =$team['team']['name'];
                $id =$team['team']['id'];

                $result['entities'][$id] = $name;
            }
            return  $result;

        } catch (Exception $e) {
            $this->logger->error(
                '[partoo-request-get-exception] Request Exception',
                [
                    'exception' => $e->getMessage(),
                ]
            );
            return [];
        }
    }


    public function showTeam($id)
    {

        try {
//            $response = $this->guzzleHttpClient->request('GET', 'https://v3.football.api-sports.io/teams/statistics',
//                [
//                    'team' => $id,
//                    'league' => 10,
//                ]
//            );
            // $this->response = json_decode($response->getContent(), true);
            $json = file_get_contents('./statistics.json');
            $sites = json_decode($json, true);

                $details =$sites['response']['fixtures'];

                return $details;

        } catch (Exception $e) {
            $this->logger->error(
                '[partoo-request-get-exception] Request Exception',
                [
                    'exception' => $e->getMessage(),
                ]
            );
            return [];
        }
    }

    public function setParams($params)
    {
        $this->params = $params + $this->params;

        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getMaxPage()
    {
        return $this->response['max_page']??0;
    }

    public function getCurrentPage()
    {
        return $this->response['page']??0;
    }

    public function setPage($page)
    {
        $this->params['page'] = $page;

        return $this;
    }

    public function getPage()
    {
        return $this->params['page'];
    }

    public function nextPage()
    {
        $this->params['page'] += 1;

        return $this;
    }

}
