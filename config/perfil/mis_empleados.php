<?php
    require '../conexion.php';
    include_once __DIR__ . "/../../classes/permissions.php";
    include_once __DIR__ . "/../../classes/roles.php";
    $object = new connection_database();

    $id = $_POST["sessionid"];
    $rol_id = $_POST["rol"];

    if(Roles::FetchSessionRol($rol_id) == "Director general"){
        $sql = $object->_db->prepare("SELECT r.nombre AS tipo_trabajador, CONCAT(u.nombre, ' ', u.apellido_pat, ' ', u.apellido_mat) AS nombre, u.id AS usuario_id, e.id AS expediente_id FROM usuarios u INNER JOIN roles r ON r.id=u.roles_id INNER JOIN expedientes e ON e.users_id=u.id WHERE r.nombre NOT IN('Superadministrador', 'Administrador', 'Director general', 'Usuario externo')");
        $sql -> execute();
    }else if(Roles::FetchSessionRol($rol_id) == "Director"){

        if(Roles::FetchUserDepartamento($id) == "Operaciones" || Roles::FetchUserDepartamento($id) == "Ventas"){
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen') UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento IN ('Call center', 'Operaciones', 'Laboratorio', 'Almacen')");
            $sql -> execute(array(':rolnom' => 'Gerente', ':rolnom2' => 'Gerente'));
        }else{
            $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento= :depanom UNION ALL SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r2.nombre = :rolnom2 AND d2.departamento=:depanom2");
            $sql -> execute(array(':rolnom' => 'Gerente', ':depanom' => Roles::FetchUserDepartamento($id), ':rolnom2' => 'Gerente', ':depanom2' => Roles::FetchUserDepartamento($id)));
        }
    }else if(Roles::FetchSessionRol($rol_id) == "Gerente"){
        $sql = $object->_db->prepare("SELECT r2.nombre AS tipo_trabajador, CONCAT(u2.nombre, ' ', u2.apellido_pat, ' ', u2.apellido_mat) AS nombre, u2.id AS usuario_id, e2.id AS expediente_id FROM jerarquia AS t1 INNER JOIN roles r1 ON r1.id=t1.rol_id LEFT JOIN jerarquia AS t2 ON t2.jerarquia_id = t1.id INNER JOIN roles r2 ON r2.id=t2.rol_id INNER JOIN usuarios u2 ON u2.roles_id=r2.id INNER JOIN departamentos d2 ON d2.id=u2.departamento_id INNER JOIN expedientes e2 ON e2.users_id=u2.id WHERE r1.nombre = :rolnom AND d2.departamento= :depanom");
        $sql -> execute(array(':rolnom' => Roles::FetchSessionRol($rol_id), ':depanom' => Roles::FetchUserDepartamento($id)));
    }
    $data=$sql->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($data, JSON_UNESCAPED_UNICODE);
?>
