<?php
    // require loaders
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_helpers.php';

    class Dialects {
        private $stmt = '';
        private $table = 'dialects';
        private $db = '';
        private $conn = '';
        private $dialect_name = '';
        private $Json = '';

        // consructor
        function __construct () {
            $this->Json = new Json();
            $this->db = new DB();
            $this->conn = $this->db->getConnection();
        }

        // function to add new dialect
        function addDialect ($dialect_name = '') {
            // trim the inputs
            $dialect_name = trim($dialect_name);
            // check if function argument presents and if it's not null
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'dialect to add not found'
                ];
                $this->Json->printJson($info);
            }

            $this->dialect_name = addslashes($dialect_name);

            // check if the dialect already exists
            $this->stmt = "SELECT dialect_name FROM $this->table WHERE dialect_name='$this->dialect_name'";
            $q = $this->conn->query($this->stmt);
            if ($q->num_rows >= 1) {
                // dialect already exists
                $info = [
                    'success' => false,
                    'message' => "dialect '{$this->dialect_name}' already exists"
                ];
                $this->Json->printJson($info);
            }

            // insert the dilect
            $this->stmt = "INSERT INTO $this->table(dialect_name) VALUES('$this->dialect_name')";
            $q = $this->conn->query($this->stmt);

            // check if query was not a success
            if (!$q) {
                $info = [
                    'success' => false,
                    'message' => 'dialect insert was not a success'
                ];
                $this->Json->printJson($info);
            }

            // dialect insert was a success
            $info = [
                'success' => true,
                'message' => 'the dialect has been successfully added',
                'data' => [
                    'dialect_id' => $this->conn->insert_id,
                    'dialect_name' => $this->dialect_name
                ]
            ];
            $this->Json->printJson($info);
        }

        // function to get dialect(s)
        function getDialects ($dialect_name = '') {
            $dialect_name = trim($dialect_name);
            // array_key_exists('dialect_name', $_GET) && $_GET['dialect_name'] != NULL
            // check if function argument presents and if it's not null
            if ($dialect_name != NULL) {
                $this->dialect_name = $dialect_name;

                $this->stmt = "SELECT * FROM $this->table WHERE dialect_name = '$this->dialect_name'";
                $q = $this->conn->query($this->stmt);

                // check if dialect not exists
                if ($q->num_rows < 1) {
                    $info = [
                        'success' => false,
                        'message' => "dialect {$this->dialect_name} not exists yet"
                    ];
                    $this->Json->printJson($info);
                }

                // dialect does exist
                $info = [
                    'success' => true,
                    'data' => $q->fetch_assoc()
                ];
                $this->Json->printJson($info);
            }

            // no query string, select all dialects
            $this->stmt = "SELECT * FROM $this->table ORDER BY dialect_name";
            $q = $this->conn->query($this->stmt);

            // check if there's no registered dialect
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no dialect(s) registered yet'
                ];
                $this->Json->printJson($info);
            }

            // dialect(s) found, loop through them
            while ($record = $q->fetch_assoc()) {
                $dialects[] = $record;
            }

            $info = [
                'success' => true,
                'data' => $dialects
            ];
            $this->Json->printJson($info);
        }

        // function to search dialect(s)
        function searchDialects ($dialect_name = '') {
            $dialect_name = trim($dialect_name);
            // check if function argument presents and if it's not null
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'dialect(s) name to search not found'
                ];
                $this->Json->printJson($info);
            }

            $this->dialect_name = $dialect_name;

            // no query string, select all dialects
            $this->stmt = "SELECT * FROM $this->table WHERE dialect_name LIKE '$this->dialect_name%' ORDER BY dialect_name";
            $q = $this->conn->query($this->stmt);

            // check if there's no registered dialect
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no dialect match your search'
                ];
                $this->Json->printJson($info);
            }

            // dialect(s) found, loop through them
            while ($record = $q->fetch_assoc()) {
                $dialects[] = $record;
            }

            $info = [
                'success' => true,
                'data' => $dialects
            ];
            $this->Json->printJson($info);
        }
    }
?>