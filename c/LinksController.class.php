<?php
require_once "c/LinksManager.class.php";

class LinksController
{

    private $linksManager;

    public function __construct()
    {
        $this->linksManager = new LinksManager();
        $this->linksManager->loadLinks();
    }

    public function showLinks()
    {
        $linksArray = $this->linksManager->getLinks();
        require "v/links.view.php";
    }
    public function showLinksAdmin()
    {
        $linksArray = $this->linksManager->getLinks();
        require "v/links-admin.view.php";
    }

}