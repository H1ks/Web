<?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "comments_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Если форма была отправлена, добавляем комментарий в базу данных
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"]);
        $comment = htmlspecialchars($_POST["comment"]);

        // Защита от SQL-инъекций
        $name = $conn->real_escape_string($name);
        $comment = $conn->real_escape_string($comment);

        $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
        $conn->query($sql);
    }

    // Получаем список комментариев из базы данных
    $sql = "SELECT * FROM comments ORDER BY id ASC";
    $result = $conn->query($sql);

    // Выводим список комментариев
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><b>" . $row["name"] . ":</b> " . $row["comment"] . "</p>";
        }
    } else {
        echo "Нет комментариев.";
    }

    $conn->close();
?>