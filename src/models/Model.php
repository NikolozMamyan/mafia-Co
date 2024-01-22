<?php

namespace App\Models;

use DateTime;
use DB;
use Exception;

/**
 * Classe abstraite Model
 *
 * @package models
 */
abstract class Model
{
    protected const CREATED_AT_FORMAT = 'Y-m-d H:i:s';

    protected static string $childTableName;

    // Propriétés pour le suivi des champs modifiés
    protected array $changedFields = [];

    protected ?int $idUtilisateur;

    /**
     * Constructeur de la classe Model
     *
     * @param array $data Données à hydrater
     */
    public function __construct(array $data = [])
    {
        $this->hydrate($data);
    }

    /**
     * Méthode pour hydrater l'objet à partir d'un tableau associatif
     *
     * @param array $data Données à hydrater
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                
                $this->$key = $value;
            }
        }
        return $this;
    }

    /**
     * Méthode pour formater une date selon le format requis
     *
     * @param string|null $date Date à formater
     * @return string Date formatée
     */
    public function formatDate(?string $date): string
    {
        return $date ? date(self::CREATED_AT_FORMAT, strtotime($date)) : '';
    }

    /**
     * Méthode pour formater une date et/ou une heure selon le format requis
     *
     * @param DateTime|string|null $dateTime Date/heure à formater
     * @return string Date/heure formatée
     */
    public function formatDateTime(string $dateTime): string
    {
        if ($dateTime instanceof DateTime) {
            return $dateTime->format(self::CREATED_AT_FORMAT);
        }

        return $dateTime ? date(self::CREATED_AT_FORMAT, strtotime($dateTime)) : '';
    }

    /**
     * Méthode pour sauvegarder ou mettre à jour les données dans la base de données
     *
     * @param bool $forced Indique si la mise à jour est forcée
     * @return bool Succès de l'opération
     */
    public function save(string $tableName = null, string $idName = null, bool $forced = false): bool
    {
        try {
            if (!$tableName) {
                $tableName = static::$childTableName;
            }
            if ($this->$idName ?? null) {
                $success = $forced ?
                    DB::update($tableName, $this->toArray(), $this->$idName) :
                    DB::update($tableName, $this->getChangedFields(), $this->$idName);
            } else {
                $success = DB::insert($tableName, $this->toArray());
            }

            return (bool) $success;
        } catch (\Exception $e) {
            // Log the exception or handle it in a way that makes sense for your application
            return false;
        }
    }

    /**
     * Méthode pour supprimer les données de la base de données
     *
     * @return bool Succès de l'opération
     */
    public function delete(): bool
    {
        try {
            return (bool) self::staticDelete($this->idUtilisateur);
        } catch (\Exception $e) {
            // Gérer les exceptions de base de données ici
            return false;
        }
    }

    /**
     * Méthode statique pour supprimer un enregistrement par ID de la base de données
     *
     * @param int $id ID de l'enregistrement à supprimer
     * @return bool Succès de l'opération
     */
    public static function staticDelete(int $id): bool
    {
        try {
            $tableName = static::$childTableName;

            return (bool) DB::statement(
                "DELETE FROM $tableName WHERE idUtilisateur = :id",
                ['id' => $id],
            );
        } catch (\Exception $e) {
            // Gérer les exceptions de base de données ici
            return false;
        }
    }

    /**
     * Méthode pour obtenir uniquement les champs modifiés
     *
     * @return array Champs modifiés
     */
    public function getChangedFields(): array
    {
        $toArray = $this->toArray();
        $updates = [];

        foreach ($this->changedFields as $key) {
            if (array_key_exists($key, $toArray)) {
                $updates[$key] = $toArray[$key];
            }
        }

        return $updates;
    }

    /**
     * Méthode pour convertir les données d'objet en tableau associatif
     *
     * @return array Données d'objet sous forme de tableau
     */
    public function toArray(): array
    {
        $toArray = get_object_vars($this);

        // Supprimer les propriétés non nécessaires
        unset($toArray['changedFields']);

        return $toArray;
    }

    /**
     * prepareCreatedAt
     *
     * @param  mixed $created_at
     * @return string
     */
    public function prepareCreatedAt(string|DateTime|null $created_at): string
    {
        if (!$created_at) {
            $created_at = date(self::CREATED_AT_FORMAT);
        } elseif ($created_at instanceof DateTime) {
            $created_at = $created_at->format(self::CREATED_AT_FORMAT);
        }

        return $created_at;
    }

    /**
     * setFields
     *
     * @param  mixed $name
     * @param  mixed $value
     * @return void
     */
    public function setFields($name, $value): void
    {
        if (property_exists($this, $name) && isset($this->$name) && $this->$name != $value) {
            $this->changedFields[] = $name;
        }

        $this->$name = $value;
    }


    public static function findById(int $id, array $tableInfo, array $orderJoin = [], array $whereInfo = [])
    {
        //SELECT 
        //joursemaine.*
        //FROM Utilisateurs 
        //JOIN Itineraire 
        // ON Utilisateurs.iditineraire = itineraire.iditineraire 
        // JOIN ItineraireJourSemaine 
        //  ON Itineraire.idItineraire = ItineraireJourSemaine.idItineraire
        // JOIN JourSemaine 
        // ON ItineraireJourSemaine.idJourSemaine = JourSemaine.idJourSemaine 

        // WHERE Utilisateurs.idUtilisateur
      

        // Vérifier si les informations de la table sont fournies
        if (!isset($tableInfo['table']) || !isset($tableInfo['primary_key'])) {
            throw new Exception("Les informations de la table ne sont pas complètes.");
        }

        // Construire la requête SELECT de base
        $query = "SELECT {$tableInfo['select']}.* FROM {$tableInfo['table']}";

        // Stocker les valeurs du tableau $orderJoin dans des tableaux distincts
        $joinTables = [];
        $joinKeys = [];

        foreach ($orderJoin as $joinTable => $joinKey) {
            $joinTables[] = $joinTable;
            $joinKeys[] = $joinKey;
        }

        // Ajouter les jointures si des informations supplémentaires sont fournies
        if (!empty($joinTables) && !empty($joinKeys)) {
            $query .= " JOIN {$joinTables[1]}";

            $query .= "  ON {$joinTables[0]}.{$joinKeys[1]} = {$joinTables[1]}.{$joinKeys[1]}";
            $query .= " JOIN {$joinTables[2]}";
            $query .= "  ON {$joinTables[1]}.{$joinKeys[2]} = {$joinTables[2]}.{$joinKeys[2]}";
            $query .= " JOIN {$joinTables[3]}";
            $query .= "  ON {$joinTables[2]}.{$joinKeys[3]} = {$joinTables[3]}.{$joinKeys[3]}";
        }
        // Ajouter la clause WHERE si elle est spécifiée
        if (!empty($whereInfo) && isset($whereInfo['where_table']) && isset($whereInfo['where_key'])) {
            $query .= " WHERE {$whereInfo['where_table']}.{$whereInfo['where_key']} = :id";
        }
        

        // Paramètres
        $params = [':id' => $id];
        exit;
        try {
            // Exécution de la requête
            $result = DB::fetchAll($query, $params);

            // Retourner la première ligne
            return $result ? $result[0] : false;
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'exécution de la requête : " . $e->getMessage());
        }
    }
}
