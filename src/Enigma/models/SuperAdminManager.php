<?php

class SuperAdminManager extends GatewaySuperAdmin
{

    public function getAllUser(): array
    {
        return parent::getAllUser();
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