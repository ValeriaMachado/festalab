<?php

namespace App\Services;

class BugHandler 
{
    public function getBugsForToday(array $bugs) :array
    {
        $bugs_hoje = array();

        foreach ($bugs as $bug) {

            if ($bug->prioridade == "Crítico" || $bug->idade > 2) {
                array_push($bugs_hoje, $bug);
            }
        }

        return $bugs_hoje;
    }

    public function getBugsSeparatedForDevs(array $bugs) :array
    {
        usort($bugs, function ($a, $b) {
            return $b->estimativa - $a->estimativa;
        });

        $days = array();
        $lastBug = count($bugs);

        for ($i = 0; $i < $lastBug; $i++) {

            $horas = $bugs[$i]->estimativa;
            $bugsDev = array();

            array_push($bugsDev, $bugs[$i]);

            while ($horas < 8) {
                $horas += $bugs[$lastBug - 1]->estimativa;
                if ($horas <= 8 && $lastBug > 1) {
                    array_push($bugsDev, $bugs[$lastBug - 1]);
                    $lastBug--;
                }
            }

            $days[$i] = $bugsDev;
        }

        return $days;
    }

}
