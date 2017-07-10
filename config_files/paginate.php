<?php

    class Paginate
    {
        
        public function pages_maker()

        {
            $servername = "localhost";
            $dbname       = "urlizer";
            $dbusername = "root";
            $dbpassword = "";
            $error      = FALSE;
            $result     = FALSE;

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $total  = $conn->query("SELECT COUNT(id) as rows FROM users")
                          ->fetch(PDO::FETCH_OBJ);

                $perpage = 2;
                $posts  = $total->rows;
                $pages  = ceil($posts / $perpage);

                # default
                $get_pages = isset($_GET['page']) ? $_GET['page'] : 1;

                $data = array(

                    'options' => array(
                        'default'   => 1,
                        'min_range' => 1,
                        'max_range' => $pages
                        )
                );

                $number = trim($get_pages);
                $number = filter_var($number, FILTER_VALIDATE_INT, $data);
                $range  = $perpage * ($number - 1);

                $prev = $number - 1;
                $next = $number + 1;

                $stmt = $conn->prepare("SELECT * FROM users LIMIT :limit, :perpage");
                $stmt->bindParam(':perpage', $perpage, PDO::PARAM_INT);
                $stmt->bindParam(':limit', $range, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetchAll();

            } catch(PDOException $e) {
                $error = $e->getMessage();
            }

            $conn = null;
        }
    }

    $pages_maker = new Paginate;
    $pages_maker->pages_maker();

?>