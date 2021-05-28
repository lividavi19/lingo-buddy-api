<?php
    // headers
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: '.(!empty($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME']);

    // require loaders
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_db.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_helpers.php';

    class Terms {
        private $table = 'terms';
        private $term = '';
        private $dialect_name = '';
        private $translation = '';
        private $stmt = '';
        private $db = '';
        private $conn = '';
        private $Json = '';

        // consructor
        function __construct () {
            $this->Json = new Json();
            $this->db = new DB();
            $this->conn = $this->db->getConnection();
        }

        // function to add new term
        function addTerm ($dialect_name = '', $term = '', $translation = '') {
            // strip whitw spaces from the inputs
            $dialect_name = trim($dialect_name);
            $term = trim($term);
            $translation = trim($translation);
            // check if function arguments presents and if it's not null
            // check for dialect_name
            if ($dialect_name == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'dialect for the term not found'
                ];
                $this->Json->printJson($info);
            }
            // check for term
            if ($term == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'term to add not found'
                ];
                $this->Json->printJson($info);
            }
            // check for translation
            if ($translation == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'translation to the term not found'
                ];
                $this->Json->printJson($info);
            }

            $this->dialect_name = addslashes($dialect_name);
            $this->term = addslashes($term);
            $this->translation = addslashes($translation);

            // check if the term already exists
            $this->stmt = "SELECT term FROM $this->table WHERE dialect='$this->dialect_name' && term='$this->term' && translation='$this->translation'";
            $q = $this->conn->query($this->stmt);
            if ($q->num_rows >= 1) {
                // term already exists
                $info = [
                    'success' => false,
                    'message' => "the {$this->dialect_name} term '{$this->term}' with the given translation already exists"
                ];
                $this->Json->printJson($info);
            }

            // insert the term
            $this->stmt = "INSERT INTO $this->table(dialect, term, translation) VALUES('$this->dialect_name', '$this->term', '$this->translation')";
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
                'message' => 'the term has been successfully added',
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
            // check if function argument presents and if it's not null
            if ($term != NULL) {
                $this->term = $term;

                $this->stmt = "SELECT dialect, term, translation FROM $this->table WHERE dialect = '$this->term' || term = '$this->term' || translation = '$this->term' ORDER BY term, translation";
                $q = $this->conn->query($this->stmt);

                // check if term not exists
                if ($q->num_rows < 1) {
                    $info = [
                        'success' => false,
                        'message' => "term '{$this->term}' not exists yet"
                    ];
                    $this->Json->printJson($info);
                }

                // term does exist

                while ($record = $q->fetch_assoc()) {
                    $terms[] = $record;
                }
                $info = [
                    'success' => true,
                    'data' => $terms
                ];
                $this->Json->printJson($info);
            }

            // no query string, select all terms
            $this->stmt = "SELECT dialect, term, translation FROM $this->table ORDER BY term, translation";
            $q = $this->conn->query($this->stmt);

            // check if there's no registered term
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no term(s) registered yet'
                ];
                $this->Json->printJson($info);
            }

            // term(s) found, loop through them
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
            // check if function argument presents and if it's not null
            if ($term == NULL) {
                $info = [
                    'success' => false,
                    'message' => 'term(s) to search not found'
                ];
                $this->Json->printJson($info);
            }

            $this->term = $term;

            // no query string, select all terms
            $this->stmt = "SELECT dialect, term, translation FROM $this->table WHERE dialect LIKE '$this->term%' || term LIKE '$this->term%' || translation LIKE '$this->term%' ORDER BY term, translation";
            $q = $this->conn->query($this->stmt);

            // check if there's no registered term
            if ($q->num_rows < 1) {
                $info = [
                    'success' => false,
                    'message' => 'no term match your search'
                ];
                $this->Json->printJson($info);
            }

            // term(s) found, loop through them
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