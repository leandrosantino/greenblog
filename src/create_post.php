<?php
$header = include './header.php';

include './database/database.php';

$host = 'http://' . $_SERVER['HTTP_HOST'];
$msg = '<span></span>';

if (
  isset($_POST['user_id']) &&
  isset($_POST['title']) &&
  isset($_POST['content']) &&
  isset($_POST['subtitle'])
) {

  $data = (object)[
    'user_id' => $_POST['user_id'],
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'subtitle' => $_POST['subtitle']
  ];

  $resp = create_post($data);

  $msg = <<<HTML
    <span id="msg" data-error="false">
      Post criado com sucesso!!
    </span>
  HTML;

  if (!$resp) {
    $msg = <<<HTML
      <span id="msg" data-error="true">
        Erro ao criar novo post, tente novamente!
      </span>
    HTML;
  }
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/create_post.css">
  <script src="/scripts/jquery.js"></script>
  <script src="/scripts/create_post.js"></script>
  <title>Novo Post</title>
</head>

<body>
  <?= $header ?>

  <main id="main_home">

    <div>
      <h1>Novo Post</h1>

      <form action="" method="post">

        <input type="text" name="user_id" hidden id="user_id">

        <label for="title">Título:</label>
        <input name="title" id="title" type="text" required />

        <label for="subtitle">Subtítulo:</label>
        <input name="subtitle" id="subtitle" type="text" required />

        <label for="content">Conteúdo:</label>
        <textarea name="content" id="content" cols="30" rows="10" required></textarea>

        <div>
          <?= $msg ?>
          <button id="bt_create" type="submit">
            Criar
            <span id="add_icon" class="bi bi-plus-circle"></span>
          </button>
        </div>

      </form>
    </div>

  </main>

</body>

<script>
  $("#user_id").prop('value', session.userid)
  setTimeout(() => {
    $('#msg').html('')
  }, 5000)
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>