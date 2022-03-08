<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\App;
use Config\Services;
use Tests\Support\Libraries\ConfigReader;
use App\Services\BugHandler;

final class BugHandlerTest extends CIUnitTestCase
{
    public function testGetBugsForToday()
    {
        $bugHandler = new BugHandler();

        $response = $bugHandler->getBugsForToday($this->generateBugs());

        $this->assertIsArray($response);
    }

    public function testGetBugsSeparatedForDevs()
    {
        $bugHandler = new BugHandler();

        $response = $bugHandler->getBugsSeparatedForDevs($this->generateBugs());

        $this->assertIsArray($response);
    }

    private function generateBugs() :array
    {
        $bugs = array();    

        for ($i=0; $i < rand(1, 10); $i++) { 
            $bug = new \stdClass;

            $prioridade = array("baixa", "media", "alta", "critica");
            $prioridade = array_rand($prioridade, 1);

            $bug->titulo = substr(str_shuffle("qwertyuiopasdfghjklzxcvbnm"), 0, 5);
            $bug->idade = rand(0, 3);
            $bug->estimativa = rand(0, 8);
            $bug->prioridade = $prioridade[0];
            $bugs[$i] = $bug;
        }

        return $bugs;
    }
}
