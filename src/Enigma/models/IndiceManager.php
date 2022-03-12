<?php

class IndiceManager extends GatewayIndice
{

    /**
     * @param $enigme
     * @param $difficulte
     * @return array
     */
    function getIndicesByEnigme($enigme): array
    {
        return $this->getIndices($enigme);
    }

    /**
     * @param $enigme
     * @param $difficulte
     * @param $indice1
     * @param $indice2
     * @param $indice3
     */
    function modifierIndiceEnigme($enigme, $indice1, $indice2, $indice3)
    {
        $this->modifierIndice($enigme, $indice1, $indice2, $indice3);
    }

}