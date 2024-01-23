<?php

namespace App\Controllers;

use DB;
use Map;
use Auth;

class SearchController extends Controller
{
    public function index()
    {
        $this->render('search/search');
    }

    public function result()
    {
        $currentUser = Auth::getCurrentUser();

        $pagination = ($_POST['pagination'] ?? null) ?: $_SESSION['pagination'] ?? 100;
        $_SESSION['pagination'] = $pagination;

        $searchField = $_POST['searchBar'] ?? '';

        $baseQuerry = "SELECT * FROM utilisateurs JOIN points on utilisateurs.idPoint = points.idPoint";

        $whereSearchSQL = '';
        $searchFields = explode(' ', $searchField);
        foreach ($searchFields as $key => $search) {
            if (empty($search)) {
                unset($searchFields[$key]);
                continue;
            }

            if ($whereSearchSQL) {
                $whereSearchSQL .= ' OR ';
            }

            $k = ':search' . $key;
            $searchFields[$k] = '%' . $search . '%';
            unset($searchFields[$key]);


            if (in_array('nom/prenom', $_POST['filter']) and !in_array('ville/Cp', $_POST['filter'])) {
                $whereSearchSQL .=
                    ' utilisateurs.nomUtilisateur LIKE ' . $k
                    . ' OR utilisateurs.prenomUtilisateur LIKE ' . $k;
            }

            if (in_array('ville/Cp', $_POST['filter']) and !in_array('nom/prenom', $_POST['filter'])) {
                $whereSearchSQL .=
                    ' points.nomVille LIKE ' . $k
                    . ' OR points.codePostalVille LIKE ' . $k;
            }

            if (in_array('ville/Cp', $_POST['filter']) and in_array('nom/prenom', $_POST['filter'])) {
                $whereSearchSQL .=
                    ' utilisateurs.nomUtilisateur LIKE ' . $k
                    . ' OR utilisateurs.prenomUtilisateur LIKE ' . $k
                    . ' OR points.nomVille LIKE ' . $k
                    . ' OR points.codePostalVille LIKE ' . $k;
            }
        }

        if ($whereSearchSQL) {
            $whereSearchSQL = ' WHERE ' . $whereSearchSQL;
            $whereSearchSQL .= ' AND utilisateurs.idUtilisateur <> ' . $currentUser['idUtilisateur'];
        } else {
            $whereSearchSQL .= ' WHERE utilisateurs.idUtilisateur <> ' . $currentUser['idUtilisateur'];
        }


        $page = $_POST['page'] ?? 1;
        $offset = ($page - 1) * $pagination;

        $users = DB::fetch(
            $baseQuerry . $whereSearchSQL,
            $searchFields,
            $pagination,
            $offset,
        );

        if ($users === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit('search');
        }

        if (!empty($users)) {
            foreach ($users as $key => $user) {
                $user['distance'] = number_format(Map::haversineDistanceList([[
                    'latitude' => $currentUser['latitude'],
                    'longitude' =>  $currentUser['longitude']
                ]], [[
                    'latitude' => $user['latitude'],
                    'longitude' =>   $user['longitude']
                ]], in_array('ville/Cp', $_POST['filter']) ? 5.5 : 10000)[0]['distance'], 2, ',', ' ');
                $users[$key] = $user;
            }
            $_SESSION['users'] = $users;
        }


        redirectToRouteAndExit('search');
    }
}
