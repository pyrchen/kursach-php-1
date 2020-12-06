<?php 

    $server = 'localhost';  
    $name = 'kp';
    $pass = 'kp';
    $db = 'kursach';

    $mysql = new mysqli($server, $name, $pass, $db); 

    
    $sql = 'SELECT number_group, name_spec, name_fac 
            FROM grups 
            INNER JOIN specialnost ON grups.id_spec=specialnost.id_spec
            INNER JOIN student ON grups.id_group=student.id_group
            INNER JOIN faculty ON student.id_fac=faculty.id_fac
            GROUP BY number_group
            ';

    $result = mysqli_query($mysql, $sql);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса");
        exit();
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$row[number_group]</td>
            <td>$row[name_spec]</td>
            <td>$row[name_fac]</td>
            <td data-to=\"show-in-window\">Открыть</td>
        </tr>
        ";
    }

    $mysql->close();
?>