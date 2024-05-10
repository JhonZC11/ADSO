<?php
    require_once('../php/Database.class.php');

    class Client{
        public static function create_client($cc, $nombres, $apellidos, $tel, $dir, $correo){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('INSERT INTO operarios (cedula, nombres, apellidos, telefono, direccion, correo) VALUES (:cc, :name, :ape, :tele, :dir, :email)');
            $stmt->bindParam(':cc',$cc);
            $stmt->bindParam(':name',$nombres);
            $stmt->bindParam(':ape',$apellidos);
            $stmt->bindParam(':tele',$tel);
            $stmt->bindParam(':dir',$dir);
            $stmt->bindParam(':email',$correo);

            if($stmt->execute()){
                header('HTTP/1.1 201 Cliente creado correctamente');
            } else {
                header('HTTP/1.1 404 Cliente no se ha creado correctamente');
            }
        }

        public static function delete_client_by_id($id){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('DELETE FROM listado_clientes WHERE id=:id');
            $stmt->bindParam(':id',$id);
            if($stmt->execute()){
                header('HTTP/1.1 201 Cliente borrad correctamente');
            } else {
                header('HTTP/1.1 404 Cliente no se ha podido borrar correctamente');
            }
        }

        public static function get_all_clients(){
            $database = new Database();
            $conn = $database->getConnection();
            $stmt = $conn->prepare('SELECT * FROM listado_clientes');
            if($stmt->execute()){
                $result = $stmt->fetchAll();
                echo json_encode($result);
                header('HTTP/1.1 201 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar los clientes');
            }
        }

        public static function update_client($id, $email, $name, $city, $telephone){
            $database = new Database();
            $conn = $database->getConnection();

            $stmt = $conn->prepare('UPDATE listado_clientes SET email=:email, name=:name, city=:city, telephone=:telephone WHERE id=:id');
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':city',$city);
            $stmt->bindParam(':telephone',$telephone);
            $stmt->bindParam(':id',$id);

            if($stmt->execute()){
                header('HTTP/1.1 201 Cliente actualizado correctamente');
            } else {
                header('HTTP/1.1 404 Cliente no se ha podido actualizar correctamente');
            }

        }
    }

?>