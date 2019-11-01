<?php

namespace controllers;

use core\AbstractController;
use mysqli;
use core\Route;
use models\AuthModel;

class AuthController extends AbstractController {

    public function index() {
	if (AuthModel::haveAuthUser()) {
	    Route::redirect(url('/'));
	}
	$this->view->render('auth_index_view');
    }

    public function registration() {
	$this->view->render('auth_register_view');
    }

    public function regproc() {
	$this->_checkMethod('POST');
	$user = filter_input_array(INPUT_POST);
	//TODO все проверки
	$model = $this->_getModel();
	$model->addUser($user);
	Route::redirect(url('/auth'));
    }

    public function login() {
	$this->_checkMethod('POST');
	$user = filter_input_array(INPUT_POST);
	//TODO validate input data
	if (!$this->_getModel()->authenticationUser($user)) {
	    //TODO send error to login
	    Route::redirect(url('/auth/index'));
	}
	Route::redirect(url('/'));
    }

    public function logout() {
	session_destroy();
	Route::redirect(url('/'));
    }

    /**
     * create and return model object
     * 
     * @return AuthModel
     */
    protected function _getModel() {
	if (!$this->model) {
	    $this->model = new AuthModel();
	}
	return $this->model;
    }

    /**
     * check HTTP method or die
     * 
     * @param string $method
     */
    protected function _checkMethod(string $method) {
	$method = strtoupper($method);
	if ($_SERVER['REQUEST_METHOD'] !== $method) {
	    die('not available request method');
	}
    }

}
