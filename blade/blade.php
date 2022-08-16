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
    <div class="title">
        <h1><?= $headerTitle; ?></h1>
    </div>
    <div class="login">
        <form action=<?= $linkTo; ?> method=<?= $method; ?>>
        <div class="account">
        <?= $heading1; ?>
        </div>
            <div class="password">
                <?= $heading2; ?>：<input type=<?= $type1; ?> name=<?= $name1; ?> placeholder=<?= $placeholder1; ?> autofocus required>
            </div>
            <div class="password">
            <?= $heading3; ?>：<input type=<?= $type2; ?> name=<?= $name2; ?> placeholder=<?= $placeholder2; ?> required>
            </div>
            <div class="button">
                <button type="button" name="reset" class="reset" onclick="javascript:location.href='<?= $resetHref; ?>'"><?= $resetButton; ?></button>
                <button type="submit" name="submit" class="submit"><?= $submitButton; ?></button>
            </div>
        </form>
    </div>
</body>

</html>