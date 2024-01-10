<?php

namespace App\Controllers;

use Auth;
use DB;

class NotesController extends Controller
{
    const URL_INDEX = '/notes.php';
    const URL_HANDLER = '/handlers/note-handler.php';

    public function index() : void
    {
        $userId = Auth::getSessionUserId();

        // Pagination
        $pagination = ($_GET['pagination'] ?? null) ?: $_SESSION['pagination'] ?? 5;
        $_SESSION['pagination'] = $pagination;

        // Fetch notes
        $page = $_GET['page'] ?? 1;
        $offset = ($page - 1) * $pagination;
        $notes = DB::fetch(
            // SQL
            "SELECT * FROM notes"
            ." WHERE user_id = :user_id"
            ." ORDER BY created_at DESC",

            // Params
            [':user_id' => $userId],

            // Limit and Offset (Separate from params for manual bind into PDO)
            $pagination,
            $offset,
        );
        if ($notes === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        // Count notes and max page
        $countNote = DB::fetch(
            "SELECT COUNT(*) as count FROM notes"
            ." WHERE user_id = :user_id",
            [':user_id' => $userId],
        )[0]['count'] ?? 0;
        if ($countNote === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        $maxPage = ceil($countNote / $pagination);

        $actionUrl = self::URL_HANDLER;
        require_once base_path('views/notes/index.php');
    }

    public function store() : void
    {
        // Prepare POST
        $title = $_POST['title'] ?? '';
        $text = $_POST['text'] ?? '';

        $_SESSION['old'] = [
            'title' => $title,
            'text' => $text,
        ];

        // Validation
        if (!$title or !$text) {
            errors("La note est vide.");
            redirectAndExit(self::URL_INDEX);
        }

        // User
        $userId = Auth::getSessionUserId();

        // Create new note
        $result = DB::statement(
            "INSERT INTO notes(user_id, title, text, created_at)"
            ." VALUE(:user_id, :title, :text, :created_at);",
            [
                'user_id' => $userId,
                'title' => $title,
                'text' => $text,
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        // Redirection
        redirectAndExit(self::URL_INDEX);
    }
}
