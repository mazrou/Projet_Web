<?php
namespace PHPMVC\Controllers;
use PHPMVC\LIB\Helper;


class IndexController extends AbstractController
{
    use Helper;
    private $conn;
    protected $_data2 = array();
    public function defaultAction()
    {

        if (isset($_SESSION)) {
            // var_dump($_SESSION);
            $_SESSION['sess_user_id'] = "";
            $_SESSION['sess_user_name'] = "";
            $_SESSION['sess_prenom'] = "";
            $_SESSION['sess_email'] = "";
            $_SESSION['sess_errormsg'] = "";
        }

        $this->_view();
    }



}
