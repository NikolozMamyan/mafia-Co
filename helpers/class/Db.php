<?php
// Durand.Louis@ccicampus.fr
//pascal.petrovic@ccicampus.fr
//S01K12t01p05--
/**
 * Class DB
 *
 * Handles database operations for the application.
 */
class DB
{
    /**
     * @var string SERVEUR The database server name.
     */
    private const SERVEUR = "localhost";

    /**
     * @var string UTILISATEUR The database username.
     */
    private const UTILISATEUR = "ccicovoiturage_user";

    /**
     * @var string MOT_DE_PASSE The database password.
     */
    private const MOT_DE_PASSE = "GT9.9%spZ*656Mb";

    /**
     * @var string NOM_BASE_DE_DONNEES The name of the database.
     */
    private const NOM_BASE_DE_DONNEES = "ccicovoiturage";

    /**
     * @var PDO|null $db The PDO database connection.
     */
    private static ?PDO $db = null; // "?PDO" allowed only on PHP 8.1+


    /**
     * Get the PDO database connection.
     *
     * @return PDO The PDO database connection.
     */
    public static function getDB()
    {
        if (self::$db === null) {
            self::$db = self::connection();
        }

        return self::$db;
    }

    /**
     * Update a record in the database.
     *
     * @param string $table The table name.
     * @param array $data The data to update.
     * @param int|string|null $identifier The identifier of the record to update.
     * @param string $identifierName The name of the identifier column.
     *
     * @return bool Returns true on success, false on failure.
     */
    public static function update(
        string $table,
        array $data,
        int|string|null $identifier = null,
        $identifierName = 'id'
    ): bool {
        // Check identifier and remove it from data
        $identifier = $identifier ?? $data[$identifierName] ?? null;
        unset($data[$identifierName]);
        if (empty($identifier)) {
            return false;
        }

        // Generate updates part of sql query

        // only keys: ['enable', 'label', 'description', 'brand', 'price_ttc', 'price_ht', 'vat', 'quantity', 'created_at']
        $keys = array_keys($data);

        // "enable = :enable, label = :label, description = :description, brand = :brand, price_ttc = :price_ttc, price_ht = :price_ht, vat = :vat, quantity = :quantity, created_at = :created_at"
        $updates = [];
        foreach ($keys as $key) {
            $updates[] = "$key = :$key";
        }
        $updates = implode(', ', $updates);

        // Inject identifier in data
        $data[$identifierName] = $identifier;

        return DB::statement(
            "UPDATE $table SET $updates"
                . " WHERE $identifierName = :$identifierName",
            $data,
        );
    }

    /**
     * Insert a new record into the database.
     *
     * @param string $table The table name.
     * @param array $data The data to insert.
     *
     * @return bool Returns true on success, false on failure.
     */
    public static function insert(string $table, array $data): bool
    {
        // only keys: ['enable', 'label', 'description', 'brand', 'price_ttc', 'price_ht', 'vat', 'quantity', 'created_at']
        $keys = array_keys($data);

        // enable, label, description, brand, price_ttc, price_ht, vat, quantity, created_at
        $cols = implode(', ', $keys);

        // :enable, :label, :description, :brand, :price_ttc, :price_ht, :vat, :quantity, :created_at
        $params = ':' . implode(', :', $keys);

        return DB::statement(
            "INSERT INTO $table ($cols)"
                . " VALUES ($params)",
            $data,
        );
    }

    /**
     * Fetch a single row from the database.
     *
     * @param string $sql The SQL query.
     * @param array $params The parameters for the query.
     * @param int|null $limit The maximum number of rows to return.
     * @param int|null $offset The offset of the first row to return.
     * @param int $fetchType The fetch style (PDO::FETCH_ASSOC by default).
     *
     * @return array|false Returns an associative array on success, false on failure.
     */
    public static function fetch(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
        int $fetchType = PDO::FETCH_ASSOC,
    ): array|false {
        return self::runQuery($sql, $params, $limit, $offset, true, $fetchType);
    }

    /**
     * Fetch all rows from the database.
     *
     * @param string $sql The SQL query.
     * @param array $params The parameters for the query.
     * @param int|null $limit The maximum number of rows to return.
     * @param int|null $offset The offset of the first row to return.
     * @param int $fetchType The fetch style (PDO::FETCH_ASSOC by default).
     *
     * @return array|false Returns an array of associative arrays on success, false on failure.
     */
    public static function fetchAll(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
        int $fetchType = PDO::FETCH_ASSOC,
    ): array|bool {
        return self::runQuery($sql, $params, $limit, $offset, true, $fetchType);
    }
      
    /**
     * Execute a SQL statement in the database.
     *
     * @param string $sql The SQL query.
     * @param array $params The parameters for the query.
     * @param int|null $limit The maximum number of rows to return.
     * @param int|null $offset The offset of the first row to return.
     *
     * @return int|false Returns the number of affected rows on success, false on failure.
     */
    public static function statement(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
    ): int|false {
        return self::runQuery($sql, $params, $limit, $offset,  false);
    }

    /**
     * Run a SQL query in the database.
     *
     * @param string $sql The SQL query.
     * @param array $params The parameters for the query.
     * @param int|null $limit The maximum number of rows to return.
     * @param int|null $offset The offset of the first row to return.
     * @param bool $fetchMode Whether to fetch rows or not.
     * @param int $fetchType The fetch style (PDO::FETCH_ASSOC by default).
     *
     * @return array|bool|int Returns an array of associative arrays, false, or the number of affected rows.
     */
    protected static function runQuery(
        string $sql,
        array $params = [],
        ?int $limit = null,
        ?int $offset = null,
        bool $fetchMode = true,
        int $fetchType = PDO::FETCH_ASSOC,
    ): array|bool|int {
        try {
            // Add Limit to sql
            if ($limit !== null) {
                $sql .= " LIMIT :limitation";
            }

            // Add Offset to sql
            if ($offset !== null) {
                $sql .= " OFFSET :offset";
            }

            // Prepare sql query
            $req = self::getDB()->prepare($sql);

            // Bind Limit
            if ($limit !== null) {
                $req->bindValue(':limitation', $limit, PDO::PARAM_INT);
            }

            // Bind Offset
            if ($offset !== null) {
                $req->bindValue(':offset', $offset, PDO::PARAM_INT);
            }

            // Bind params
            foreach ($params as $key => $value) {
                $req->bindValue($key, $value);
            }

            // Execute query
            $result = $req->execute();

            // Check result
            if ($result === false) {
                throw new Exception(self::getDB()->errorInfo()[2] ?? 'Unknown error');
            }

            return $fetchMode ? $req->fetchAll($fetchType) : $req->rowCount();
        } catch (Exception $e) {
            // TODO Write error message in a independent log file
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }

        return false;
    }

    /**
     * Establish a connection to the database.
     *
     * @return PDO|null Returns a PDO database connection or null on failure.
     */
    protected static function connection()
    {
        try {
            return new PDO(
                "mysql:host=" . self::SERVEUR . ";dbname=" . self::NOM_BASE_DE_DONNEES,
                self::UTILISATEUR,
                self::MOT_DE_PASSE,
                [
                    // Options
                    PDO::ATTR_PERSISTENT => true,
                ]
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

        return null;
    }
}
