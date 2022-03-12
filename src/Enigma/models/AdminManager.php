<?php

class AdminManager extends GatewayAdmin
{
    public function getAllUser(): array
    {
        return $this->getAllUers();
    }

    public function resetMdpManager($login)
    {
        $this->resetMdp($login);
    }

    public function supprimerLogin($login)
    {
        $this->suppOneCompte($login);
    }

    public function changerRole($login, $role)
    {
        $this->changeRole($login, $role);
    }
}