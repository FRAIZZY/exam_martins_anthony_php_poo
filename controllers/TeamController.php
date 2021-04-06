<?php
class TeamController
{
    private $teamManager;

    public function __construct()
    {
        $this->teamManager = new TeamManager();
    }

    public function display()
    {
        $arrayTeams = $this->teamManager->getAll();
        require('views/home.php');
    }

    public function displayFormTeam()
    {
        require('views/formAddTeam.php');
    }

    public function submitFormNewTeam()
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = 'The Field Name Can Not Be Empty !';
        }

        if (empty($_POST['nbPoints'])) {
            $errors[] = 'The Field nbPoints Can Not Be Empty !';
        }

        if (empty($_POST['nbButPris'])) {
            $errors[] = 'The Field nbButPris Can Not Be Empty !';
        }

        if (empty($_POST['nbButInscrits'])) {
            $errors[] = 'The Field nbButInscrits Can Not Be Empty !';
        }

        if (count($errors) == 0) {
            $team = new Team($_POST['name'], $_POST['nbPoints'], $_POST['nbButPris'], $_POST['nbButInscrits']);
            $res = $this->teamManager->create($team);
            if ($res) {
                header('Location: index.php?controller=home&action=display');
            }
        } else {
            require('views/formAddTeam.php');
        }
    }

    public function deleteTeam($id)
    {
        $this->teamManager->delete($id);
        header('Location: index.php?controller=home&action=display');
    }

    public function updateTeam($id)
    {
        $team = $this->teamManager->findById($id);
        if ($team !== null) {
            require('views/formUpdateTeam.php');
        } else {
            header('Location: index.php?controller=home&action=display');
        }
    }

    public function submitFormUpdateTeam($id)
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = 'The Field Name Can Not Be Empty !';
        }

        if (empty($_POST['nbPoints'])) {
            $errors[] = 'The Field nbPoints Can Not Be Empty !';
        }

        if (empty($_POST['nbButPris'])) {
            $errors[] = 'The Field nbButPris Can Not Be Empty !';
        }

        if (empty($_POST['nbButInscrits'])) {
            $errors[] = 'The Field nbButInscrits Can Not Be Empty !';
        }

        if (count($errors) == 0) {
            $team = new Team($_POST['name'], $_POST['nbPoints'], $_POST['nbButPris'], $_POST['nbButInscrits']);
            $team->setId($id);
            $res = $this->teamManager->update($team);
            if ($res) {
                header('Location: index.php?controller=home&action=display');
            }
        } else {
            $team = $this->teamManager->findById($id);
            require('views/formUpdateTeam.php');
        }
    }
}
