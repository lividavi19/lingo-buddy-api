<?php
    // headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: '.(!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME']);

    // require loaders
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_helpers.php';

    class Dialects {
        private $table = 'dialects';
        private $stmt = '';
        private $dialect_name = '';
        private $db = '';
        private $conn = '';
        private $Json = '';

        // consructor
        function __construct () {
            $this->Json = new Json();
            $this->db = new DB();
            $this->conn = $this->db->getConnection();
        }

        // function to a add new dialect
        function addDialect ($dialect_name = '') {
            // trim the inputs
            $dialect_name = trim($dialect_name);
            // check if function argument, for the dialect name to add, presents and if it's not null
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide a dialect name to add'
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
            // check if optional function argument, for the specific dialect to get, presents and if it's not null
            if ($dialect_name != NULL) {
                $this->dialect_name = addslashes(trim($dialect_name));

                $this->stmt = "SELECT * FROM $this->table WHERE dialect_name = '$this->dialect_name'";
                $q = $this->conn->query($this->stmt);

                // check if the dialect doesn't exist
                if ($q->num_rows < 1) {
                    $info = [
                        'success' => false,
                        'message' => "dialect '{$this->dialect_name}' doesn't exist yet"
                    ];
                    $this->Json->printJson($info);
                }

                // the dialect does exists
                $info = [
                    'success' => true,
                    'data' => $q->fetch_assoc()
                ];
                $this->Json->printJson($info);
            }

            // no optional function argument, for the specific dialect to get, select all dialects
            $this->stmt = "SELECT * FROM $this->table ORDER BY dialect_name";
            $q = $this->conn->query($this->stmt);

            // check if no dialect(s) exist(s)
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no dialect(s) exist(s) yet'
                ];
                $this->Json->printJson($info);
            }

            // dialect(s) exist(S), loop through them(or it)
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
            // check if function argument, for the dialect to search-for, presents and if it's not null
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide a dialect name to search for'
                ];
                $this->Json->printJson($info);
            }

            // function argument, for the dialect to search-for, presents and it's not null
            $this->dialect_name = addslashes($dialect_name);

            $this->stmt = "SELECT * FROM $this->table WHERE dialect_name LIKE '$this->dialect_name%' ORDER BY dialect_name";
            $q = $this->conn->query($this->stmt);

            // check if no dialect(s) exist(s)
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no dialect result match your search'
                ];
                $this->Json->printJson($info);
            }

            // dialect(s) exis(t), loop through them(or it)
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