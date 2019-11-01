<?php

namespace core;

abstract class AbstractController {

    /**
     *
     * @var AbstractModel 
     */
    public $model;

    /**
     *
     * @var View 
     */
    public $view;

    public function __construct() {
	$this->view = new View();
    }

    abstract public function index();
}
