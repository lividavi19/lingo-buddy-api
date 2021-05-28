<?php
    // headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: '.(!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME']);

    // require loaders
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_helpers.php';

    class Terms {
        private $table = 'terms';
        private $stmt = '';
        private $dialect_name = '';
        private $term = '';
        private $translation = '';
        private $db = '';
        private $conn = '';
        private $Json = '';

        // consructor
        function __construct () {
            $this->Json = new Json();
            $this->db = new DB();
            $this->conn = $this->db->getConnection();
        }

        // function to a add new term
        function addTerm ($dialect_name = '', $term = '', $translation = '') {
            // strip white spaces from the inputs
            $dialect_name = trim($dialect_name);
            $term = trim($term);
            $translation = trim($translation);
            // check if above function arguments presents, and if they're not null
            // check for dialect_name
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide the dialect name to for the term to be added'
                ];
                $this->Json->printJson($info);
            }
            // check for term
            if ($term == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide the term to be added'
                ];
                $this->Json->printJson($info);
            }
            // check for translation
            if ($translation == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide the translation for the term to be added'
                ];
                $this->Json->printJson($info);
            }

            // above function arguments presents, and they're not null
            $this->dialect_name = addslashes($dialect_name);
            $this->term = addslashes($term);
            $this->translation = addslashes($translation);

            // check if the term already exists
            $this->stmt = "SELECT term FROM $this->table WHERE dialect='$this->dialect_name' && term='$this->term' && translation='$this->translation'";
            $q = $this->conn->query($this->stmt);
            if ($q->num_rows >= 1) {
                // term and translation for the given dialect name already exists
                $info = [
                    'success' => false,
                    'message' => "the term and translation for the given dialect name already exists"
                ];
                $this->Json->printJson($info);
            }

            // term and translation for the given dialect don't exists, go on & insert the term
            $this->stmt = "INSERT INTO $this->table(*) VALUES('$this->dialect_name', '$this->term', '$this->translation')";
            $q = $this->conn->query($this->stmt);

            // check if query was not a success
            if (!$q) {
                $info = [
                    'success' => false,
                    'message' => 'term insert was not a success'
                ];
                $this->Json->printJson($info);
            }

            // term insert was a success
            $info = [
                'success' => true,
                'message' => 'the term and translation for the given dialect has been successfully added',
                'data' => [
                    'term_id' => $this->conn->insert_id,
                    'dialect' => $this->dialect_name,
                    'term' => $this->term,
                    'translation' => $this->translation
                ]
            ];
            $this->Json->printJson($info);
        }

        // function to get term(s)
        function getTerms ($term = '') {
            $term = trim($term);
            // check if optional function argument, for term(s) to get, presents and if it's not null
            if ($term != NULL) {
                $this->term = addslashes($term);

                $this->stmt = "SELECT * FROM $this->table WHERE dialect = '$this->term' || term = '$this->term' || translation = '$this->term' ORDER BY term, translation";
                $q = $this->conn->query($this->stmt);

                // check if the term doesn't exist
                if ($q->num_rows < 1) {
                    $info = [
                        'success' => false,
                        'message' => "term '{$this->term}' doesn't exist yet"
                    ];
                    $this->Json->printJson($info);
                }

                // the term does exist
                while ($record = $q->fetch_assoc()) {
                    $terms[] = $record;
                }
                $info = [
                    'success' => true,
                    'data' => $terms
                ];
                $this->Json->printJson($info);
            }

            // no optional function argument, for the specific term(s) to get, select all terms
            $this->stmt = "SELECT * FROM $this->table ORDER BY term, translation";
            $q = $this->conn->query($this->stmt);

            // check if no term(s) exist(s)
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no term(s) exist(s) yet'
                ];
                $this->Json->printJson($info);
            }

            // term(s) exist(S), loop through them(or it)
            while ($record = $q->fetch_assoc()) {
                $terms[] = $record;
            }

            $info = [
                'success' => true,
                'data' => $terms
            ];
            $this->Json->printJson($info);
        }

        // function to search term(s)
        function searchTerms ($term = '') {
            $term = trim($term);
            // check if function argument, for the term to search-for, presents and if it's not null
            if ($term == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'provide a term to search for'
                ];
                $this->Json->printJson($info);
            }

            // function argument, for the term to search-for, presents and it's not null
            $this->term = addslashes($term);

            $this->stmt = "SELECT * FROM $this->table WHERE dialect LIKE '$this->term%' || term LIKE '$this->term%' || translation LIKE '$this->term%' ORDER BY term, translation";
            $q = $this->conn->query($this->stmt);

            // check if no term(s) exist(s)
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no term result match your search'
                ];
                $this->Json->printJson($info);
            }

            // term(s) exis(t), loop through them(or it)
            while ($record = $q->fetch_assoc()) {
                $terms[] = $record;
            }

            $info = [
                'success' => true,
                'data' => $terms
            ];
            $this->Json->printJson($info);
        }
    }
?>