<?php

class GroupeManager extends GatewayGroupe
{
    /**
     * @param $pseudo
     * @param $nomGroupe
     * @param $mdp
     * @return void
     */
    public function createGroupe($pseudo, $nomGroupe, $mdp)
    {
        $this->createOneGroupe($pseudo, $nomGroupe, $mdp);
    }

    /**
     * @param $pseudo
     * @return array
     */
    public function getGroupByPseudo($pseudo): array
    {
        return $this->getAllGroupesByChef($pseudo);
    }

    /**
     * @param $pseudo
     * @return array
     */
    public function getNombreGroupe($pseudo): array
    {
        return $this->getNbGrp($pseudo);
    }

    /**
     * @throws Exception
     */
    public function getOneByName($name, $pseudoChef): array
    {
        return $this->getOneGroupe($name, $pseudoChef);
    }

    /**
     * @param $name
     * @param $chef
     * @return array
     */
    public function getMembers($name, $chef): array
    {
        return $this->getAllMembers($name, $chef);
    }

    /**
     * @param $id
     * @param $chef
     * @return void
     */
    public function deleteGroupe($id, $chef)
    {
        $this->deleteOneGrp($id, $chef);
    }

    /**
     * @param $id
     * @param $pass
     * @param $chef
     * @return void
     */
    public function modifyPassword($id, $pass, $chef)
    {
        $this->modifiyPasswordGrp($id, $pass, $chef);
    }

    /**
     * @param $id
     * @param $chef
     * @return void
     */
    public function deleteMembersByGrpId($id, $chef)
    {
        $this->deleteAllMembers($id, $chef);
    }

    /**
     * @param $id
     * @param $username
     * @param $chef
     * @return void
     */
    public function exclureUser($id, $username, $chef)
    {
        $this->exclureOneUser($id, $username, $chef);
    }

    /**
     * @param $username
     * @param $id
     * @param $chef
     * @return void
     */
    public function joinTheGroupe($username, $id, $chef)
    {
        $this->joinOneGroupe($username, $id, $chef);
    }

    /**
     * @param $username
     * @param $id
     * @param $chef
     * @return array
     */
    public function getOneMember($username, $id, $chef): array
    {
        return $this->getMember($username, $id, $chef);
    }

    public function getMyGroups($username): array
    {
        return $this->getAllOfMyGroups($username);
    }
}