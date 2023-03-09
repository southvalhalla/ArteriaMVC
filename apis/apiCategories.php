<?php
    include_once './models/categoriesModel.php';

    class ApiCategories{
        
        function getAll(){
            $category = new categoriesModel();
            $categories = array();
            $categories['items'] = array();

            $res = $category->getCategories();

            if ($res->rowCount()){
                while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $item = array(
                        'cod' => $row['cod'],
                        'tipo_pro' => $row['tipo_pro'],
                        'carac' => $row['carac']
                    );
                    array_push($categories['items'], $item);
                }
                // echo json_encode($categories);
                $this->printJSON($categories);
            } else {
                echo json_encode(array('mensaje' => 'no hay elementos registrados'));
            }
        }

        function getByID($id){
            $category = new categoriesModel();
            $categories = array();
            $categories['items'] = array();

            $res = $category->getCategory($id);

            if ($res->rowCount()){
                $row = $res->fetch();

                $item = array(
                    'cod' => $row['cod'],
                    'tipo_pro' => $row['tipo_pro'],
                    'carac' => $row['carac']
                );
                array_push($categories['items'], $item);
                
                // echo json_encode($categories);
                $this->printJSON($categories);
            } else {
                echo json_encode(array('mensaje' => 'no hay elementos registrados'));
            }
        }

        function printJSON($array){
            echo '<code>' . json_encode($array) . '</code>';
        }

        function error($mensaje){
            echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>';
        }
    }
?>