<?php


class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        if ($action == "Admin" or $action == "AdminUtilisateur")
            $this->_file = "views/admin/view" . $action . ".php";
        else if ($action == "SuperAdmin" or $action == "SuperAdminUtilisateur" or $action == "SuperAdminIndices")
            $this->_file = "views/superAdmin/view" . $action . ".php";
        else
            $this->_file = "views/view" . $action . ".php";
    }


    /** Génère et affiche la vue
     * @param $data
     * @throws Exception
     */
    public function generate($data)
    {
        global $dir;
        //Partie spécifique de la vue en question
        $content = $this->generateFile($dir . $this->_file, $data);
        $view = $this->generateFile('template/template.php', array('t' => $this->_t,
            'content' => $content));
        echo $view;
    }

    /** Génère un fichier vue et renvoie le résultat
     * @param $file
     * @param $data
     * @return false|string
     * @throws Exception
     */
    private function generateFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception('Fichier ' . $file . ' introuvable.');
        }
    }

    /**
     * @throws Exception
     */
    public function generateEmpty($data)
    {
        global $dir;
        //Partie spécifique de la vue en question
        $content = $this->generateFile($dir . $this->_file, $data);
        $view = $this->generateFile('template/templateEmpty.php', array('t' => $this->_t,
            'content' => $content));
        echo $view;
    }

    /**
     * @throws Exception
     */
    public function generateCompte($data)
    {
        global $dir;
        //Partie spécifique de la vue en question
        $content = $this->generateFile($dir . $this->_file, $data);
        $view = $this->generateFile('template/templateCompte.php', array('t' => $this->_t,
            'content' => $content));
        echo $view;
    }
}