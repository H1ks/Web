<!DOCTYPE html>
<html>
<head>
    <title>Комментарии</title>
</head>
<body>    
    <h2>Добавить комментарий</h2>
    <form action="index.php" method="post">
        <label for="name">Имя:</label>
        <input type="text" name="name" required><br>

        <label for="comment">Комментарий:</label><br>
        <textarea name="comment" rows="4" cols="50" required></textarea><br>

        <input type="submit" value="Отправить">
    </form>

    <h2>Комментарии</h2>
    <?php include '../logic/logic.php';?>

</body>
</html>
