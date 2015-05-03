<?php
	
class ServiceCPRepository
{

    protected $db;

    final public function __construct($db)
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

    public function getAllServiceCP(){
        $sql = "SELECT * FROM TypeServiceCP";
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $servicesCP = $statement->fetchAll();

        $serviceCPMapper = new serviceCPMapper();
        for($i = 0; $i < count($servicesCP); $i++){
            $servicesCP[$i] = $serviceCPMapper->transform($servicesCP[$i]);
        }
        return $servicesCP;
    }

}
