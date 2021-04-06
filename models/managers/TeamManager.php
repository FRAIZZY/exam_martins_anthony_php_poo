<?php
class TeamManager extends DbManager{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll() {
        $arrayTeams = [];
        $sql = 'SELECT * FROM team ORDER BY nbPoints DESC,nbButPris ASC,nbButInscrits DESC';
        $request = $this->bdd->prepare($sql);
        $request->execute();

        foreach($request as $team) {
            $newTeam = new Team($team['name'], $team['nbPoints'], $team['nbButPris'], $team['nbButInscrits']);
            $newTeam->setId($team['id']);
            $arrayTeams[] = $newTeam;
        }

        return $arrayTeams;
    }

    public function create(Team $team) {        
        $sql = 'INSERT INTO team (name, nbPoints, nbButPris, nbButInscrits) VALUES (:name, :nbPoints, :nbButPris, :nbButInscrits)';
        $request = $this->bdd->prepare($sql);
        $res = $request->execute([':name' => $team->getName(), ':nbPoints' => $team->getNbPoints(), ':nbButPris' => $team->getNbButPris(), ':nbButInscrits' => $team->getNbButInscrits(),]);

        return $res;
    }

    public function delete($id) {
        $sql = 'DELETE FROM team WHERE id = ?;';
        $request = $this->bdd->prepare($sql);
        $request->bindParam(1, $id);
        $request->execute();
    }

    public function findById($id) {
        $res = null;
        $sql = 'SELECT * FROM team WHERE id = ?';
        $request = $this->bdd->prepare($sql);
        $request->bindParam(1, $id);
        $request->execute();

        foreach($request as $team) {
            $res = new Team($team['name'], $team['nbPoints'], $team['nbButPris'], $team['nbButInscrits']);
            $res->setId($team['id']);
        }
        
        return $res;
    }

    public function update($team) {
        $sql = 'UPDATE team SET name = :name, nbPoints = :nbPoints, nbButPris = :nbButPris, nbButInscrits = :nbButInscrits WHERE id = :id';
        $request = $this->bdd->prepare($sql);
        $res = $request->execute([':name' => $team->getName(), ':nbPoints' => $team->getNbPoints(), ':nbButPris' => $team->getNbButPris(), ':nbButInscrits' => $team->getNbButInscrits(), ':id' => $team->getId()]);

        return $res;
    }
}
?>