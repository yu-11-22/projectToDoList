<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title; ?></title>
</head>

<body>
    <div class="header">
        <div class="inputTodo"><?= $headerTitle; ?></div>
        <form method=<?= $newToDoListMethod; ?> action=<?= $newToDoListLinkTo; ?>>
            <input type="text" name=<?= $newToDoListName; ?> placeholder="輸入待辦事項" required>
            <button type="submit" name="submit" class="btn">增加事項</button>
            <input type="hidden" name="hidden">
        </form>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th style="width: 100px;">編號</th>
                    <th style="width: 500px;">待辦事項</th>
                    <th style="width: 100px;">刪除</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($list as $item) : ?>
                    <tr>
                        <td><?= $item[0]; ?></td>
                        <td><?= $item[1]; ?></td>
                        <td>
                            <form action=<?= $deleteLinkTo; ?> method=<?= $deleteMethod; ?>>
                                <input type="hidden" value=<?= $item[2]; ?> name=<?= $item[2]; ?>>
                                <button type="submit" name="submit" style="background:none;border:none;cursor:pointer;color:red;">X</button>
                        </form>
                        </td>
                        <td>
                            <form method=<?= $toDoListMethod; ?> action=<?= $toDoListLinkTo; ?>></form>
                            <input type="text" name="<?= $item[3]; ?>" placeholder="輸入更改事項" required>
                            <button type="submit" name="submit" class="btn">確認</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="login">
        <form method=<?= $logoutMethod; ?> action=<?= $logoutLinkTo; ?>>
            <div class="button">
                <button type="button" name="reset" onclick="javascript:location.href='<?= $resetHref; ?>'" class="reset">修改</button>
                <button type="submit" name="submit" onclick="confirm('確認登出?')" class="submit">登出</button>
            </div>
        </form>

    </div>
</body>

</html>