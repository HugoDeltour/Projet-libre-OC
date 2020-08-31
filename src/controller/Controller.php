<?php

namespace App\src\controller;

use App\config\request;
use App\src\DAO\imageDAO;
use App\src\DAO\commentDAO;
use App\src\model\view;
use App\src\contrainte\validation;
use App\src\DAO\utilisateurDAO;

/**
 * class controller
 * @packages App\src\controller
 * Controlleur servant à initialiser les différentes variable nécessaire aux autres controlleur
 */
abstract class Controller
{
    protected $imageDAO;
    protected $commentDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->imageDAO = new imageDAO();
        $this->commentDAO = new commentDAO();
        $this->view = new view();
        $this->request = new request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
        $this->validation = new validation();
        $this->utilisateurDAO = new utilisateurDAO();
    }
}

?>
