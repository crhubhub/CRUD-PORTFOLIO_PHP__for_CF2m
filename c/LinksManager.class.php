<?php
require_once "m/Model.class.php";
require_once "c/Link.class.php";

class LinksManager extends Model
{
    private $links;

public function addLink($link)
{
    $this->links[] = $link;
}

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }
    public function loadLinks()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM link ORDER BY title DESC");
        $req->execute();
        $links = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($links as $link) {
            $p = new Link($link['id'], $link['title'], $link['address'], $link['description']);
            $this->addLink($p);
        }
    }


}