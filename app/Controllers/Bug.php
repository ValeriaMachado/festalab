<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Services\BugHandler;

class Bug extends BaseController
{
    use ResponseTrait;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    public function forToday()
    {
        $input_data = json_decode(file_get_contents('php://input'));

        $bugHandler = new BugHandler();

        return $this->respond($bugHandler->getBugsForToday($input_data->bugs));
    }

    public function separatedForDevs()
    {
        $input_data = json_decode(file_get_contents('php://input'));

        $bugHandler = new BugHandler();

        return $this->respond($bugHandler->getBugsSeparatedForDevs($input_data->bugs));
    }
}
