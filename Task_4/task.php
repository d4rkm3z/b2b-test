<?php
/**
 * @param $user_ids
 * @return mixed
 * @throws Exception
 */
function load_users_data($user_ids)
{
    if (empty($user_ids)) throw new Exception('Input value is null');

    $db = mysqli_connect("localhost", "root", "123123", "database");
    if (!$db) {
        throw new Exception("Unable to connect to database");
    }
    $list_user_ids = implode(",", $user_ids);
    $sql = $db->query("SELECT `id`,`name` FROM users WHERE id IN ({$list_user_ids})");
    $result = $sql->fetch_all(MYSQLI_ASSOC);

    mysqli_close($db);
    return $result;
}

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
try{
    $data = load_users_data([1, 2, 5]);
    foreach ($data as $user) {
        echo "<a href=\"/show_user.php?id={$user['id']}\">{$user['name']}</a>";
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit(1);
}
