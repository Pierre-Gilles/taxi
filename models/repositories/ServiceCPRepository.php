<?php
	
class ServiceCPRepository
{

    protected $db;

    final public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function createServiceCP($IDServiceCP, $libelleServiceCP, $prixServiceCP)
    {
        return new ServiceCP($IDServiceCP, $libelleServiceCP, $prixServiceCP);
    }

    public function saveServiceCP(ServiceCP $serviceCP)
    {
        $sql = "INSERT INTO TypeServiceCP(codeServiceCP, libelleServiceCP, prixServiceCP) ";
        $sql .= " VALUES(:IDServiceCP,:libelleServiceCP,:prixServiceCP)";
        $statement = $this->db->prepare($sql);
        $statement->bindValue("IDServiceCP", $serviceCP->getIDServiceCP());
        $statement->bindValue("libelleServiceCP", $serviceCP->getLibelleServiceCP());
        $statement->bindValue("prixServiceCP", $serviceCP->getPrixServiceCP());
        $statement->execute();
    }

}
