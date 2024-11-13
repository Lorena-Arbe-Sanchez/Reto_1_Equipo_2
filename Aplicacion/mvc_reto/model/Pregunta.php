<?php

class Pregunta {

    private $tabla = "preguntas";
    private $connection;

    public function __construct() {
        $this->getConexion();
    }

    public function getConexion(){
        $dbObj = new Db();
        $this->connection = $dbObj ->connection;
    }

    public function getPregunta(){
        $sql = "SELECT * FROM " . $this->tabla;

        $stml = $this -> connection -> prepare($sql);
        $stml -> execute();
        return $stml -> fetchAll();
    }

    public function create(){
        $this->page_title ='Crear Pregunta';
        $this->view ='create';
    }

    public function save($param) {
        $titulo = $descripcion = $tema = $archivo = "";
        $fecha = date('Y-m-d');
        $id_usuario = $_SESSION['id'];
//        $votosLike = $votosDislike = 0;

        if (isset($param["titulo"])) $titulo = $param["titulo"];
        if (isset($param["descripcion"])) $descripcion = $param["descripcion"];
        if (isset($param["tema"])) $tema = $param["tema"];
        if (isset($param["fecha"]) && !empty($param["fecha"])){
            $fecha = $param["fecha"];  // Usar la fecha proporcionada si no está vacía.
        }
        if (isset($param["id_usuario"]) && !empty($param["id_usuario"])){
            $id_usuario = $_SESSION['usuario'];
        }
        if (isset($param["archivo"])) $archivo = $param["archivo"];
//        if (isset($param["votosLike"])) $votosLike = $param["votosLike"];
//        if (isset($param["votosDislike"])) $votosDislike = $param["votosDislike"];

        /*
         $sql = "INSERT INTO " . $this->tabla . " (titulo, descripcion, tema, fecha, id_usuario, archivo, votosLike, votosDislike)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
         */
        $sql = "INSERT INTO " . $this->tabla . " (titulo, descripcion, tema, fecha, id_usuario, archivo) 
            VALUES (?, ?, ?, ?, ?, ?)";

        $stm = $this->connection->prepare($sql);
//        $stm->execute([$titulo, $descripcion, $tema, $fecha, $id_usuario, $archivo, $votosLike, $votosDislike]);
        $stm->execute([$titulo, $descripcion, $tema, $fecha, $id_usuario, $archivo]);

        $id = $this->connection->lastInsertId();
        return $id;
    }

    public function getPreguntaById($id){
        $sql = "SELECT * FROM ". $this->tabla ." WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        $stml -> execute([$id]);
        return $stml->fetch();
    }

    public function deletePregunta($id){
        // Corrección de la consulta SQL
        $sql = "DELETE FROM " . $this->tabla . " WHERE id = ?";
        $stml = $this->connection->prepare($sql);
        // Ejecutar la consulta
        $stml->execute([$id]);
        // Retornar el número de filas afectadas (puedes cambiar esto según tus necesidades)
        return $stml->rowCount();
    }

    public function deletePreguntaByIDUsuario($id){
        // Corrección de la consulta SQL
        $sql = "DELETE FROM " . $this->tabla . " WHERE id_usuario = ?";
        $stml = $this->connection->prepare($sql);
        // Ejecutar la consulta
        $stml->execute([$id]);
        // Retornar el número de filas afectadas (puedes cambiar esto según tus necesidades)
        return $stml->rowCount();
    }


    // Función para obtener todas las preguntas existentes, por defecto estará ordenada por fecha en orden descendente y con posibles filtros.
    /*
     * Es necesario pasar primero los parámetros sin valor predeterminado, ya que
     * en PHP "Los parámetros con valores predeterminados deben ir después de
     * los parámetros obligatorios que no tienen valor predeterminado".
    */
    public function getPreguntasPaginated($tema, $palabraClave, $fechaOrden, $page=1){
        // Número de elementos por página (ya definido en el "config.php").
        $limit = PAGINATION;
        $offset = ($page - 1) * $limit;

        // En un primer momento se mostrará la consulta sin condiciones referentes a los filtros.
        $sql = "SELECT * FROM " . $this->tabla . " WHERE 1=1";

        // Si se ha clicado en algún tema y el tema seleccionado no es la opción de <<Todas las opciones>>, se mostrará la consulta con esa condición.
        if ($tema && $tema !== 'todas'){
            /*
             * En la sentencia sql no se puede poner 'WHERE tema = ?' ya que no hay que
             * combinar parámetros nombrados (:*) con un parámetro posicional (?).
             * Al ya tener que poner los parámetros nombrados referentes a la paginación,
             * solo se pueden poner nombrados; los demás también tendrán que serlo.
            */
            $sql .= " AND tema = :tema";
        }

        // Filtro por palabras clave. Buscará tanto en los títulos como en las descripciones.
        if ($palabraClave){
            $sql .= " AND (titulo LIKE :palabraClave OR descripcion LIKE :palabraClave)";
        }

        /*
         * Ordenar la consulta dependiendo de si está seleccionada la opción de ordenar
         * por fecha en orden descendente (de más recientes a más antiguas), o no.
         * Por defecto aparecerá por 'desc'.
        */
        if (!$fechaOrden || $fechaOrden == 'desc'){
            $sql .= " ORDER BY fecha DESC LIMIT :limit OFFSET :offset";
        }
        else{
            $sql .= " ORDER BY fecha ASC LIMIT :limit OFFSET :offset";
        }

        $stmt = $this->connection->prepare($sql);

        // Enlace de parámetros condicionales.
        if ($tema && $tema !== 'todas'){
            $stmt->bindValue(':tema', $tema, PDO::PARAM_STR);
        }
        if ($palabraClave){
            $stmt->bindValue(':palabraClave', '%' . $palabraClave . '%', PDO::PARAM_STR);
        }

        // Parámetros para la paginación.
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Obtener el total de páginas para la paginación.
        $totalPages = ceil($this->getTotalPreguntas($tema, $palabraClave) / $limit);

        return [$preguntas, $page, $totalPages];
    }

    // Para calcular el total de registros con los filtros aplicados.
    public function getTotalPreguntas($tema = null, $palabraClave = null){
        $sql = "SELECT COUNT(*) FROM " . $this->tabla . " WHERE 1=1";

        if ($tema && $tema !== 'todas'){
            $sql .= " AND tema = :tema";
        }

        if ($palabraClave){
            $sql .= " AND (titulo LIKE :palabraClave OR descripcion LIKE :palabraClave)";
        }

        $stmt = $this->connection->prepare($sql);

        if ($tema && $tema !== 'todas'){
            $stmt->bindValue(':tema', $tema, PDO::PARAM_STR);
        }
        if ($palabraClave){
            $stmt->bindValue(':palabraClave', '%' . $palabraClave . '%', PDO::PARAM_STR);
        }

        $stmt->execute();
        return $stmt->fetchColumn();
    }


    // Función para obtener todas las preguntas pero filtradas por la cantidad de "Me gusta" en orden descendente (de mayor a menor).
    public function getPreguntasFrecuentesPaginated($page=1){
        $limit = PAGINATION;
        $offset = ($page - 1) * $limit;
        // TODO : "ORDER BY votosLike DESC ..." (favoritos)
//        $sql = "SELECT * FROM ". $this->tabla ." ORDER BY votosLike DESC LIMIT :limit OFFSET :offset";
        $sql = "SELECT * FROM ". $this->tabla ." LIMIT :limit OFFSET :offset";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $totalPages = $this->getNumberPages();
        return [$stmt->fetchAll(), $page, $totalPages];
    }

    public function getNumberPages(){
        $limit = PAGINATION;
        $total = $this->connection->query("SELECT COUNT(*) FROM ". $this->tabla)->fetchColumn();
        $total = ceil($total/$limit);

        return $total;
    }

}