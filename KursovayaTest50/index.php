<?php
// require 'minelinkk.php';
require 'db.php';


if (isset($_POST['register'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $login = mysqli_real_escape_string($conn, $_POST['login']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $bio = mysqli_real_escape_string($conn, $_POST['bio']);
  $sql = "INSERT INTO users (name, username, login, password, bio) 
          VALUES ('$name', '$username', '$login', '$password', '$bio')";
  if (mysqli_query($conn, $sql)) {
    $_SESSION['user_id'] = mysqli_insert_id($conn);
  } else {
    $register_error = "Ошибка: " . mysqli_error($conn);
  }
}




if (isset($_POST['login_btn'])) {
  $login = mysqli_real_escape_string($conn, $_POST['login']);
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($conn, $sql);

  if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
    } else {
      $login_error = "Неверный пароль!";
    }
  } else {
    $login_error = "Пользователь не найден!";
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}

$user = null;
if (isset($_SESSION['user_id'])) {
  $sql = "SELECT * FROM users WHERE id = {$_SESSION['user_id']}";
  $result = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($result);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleeee.css">
  <link rel="stylesheet" href="allay.css">
  <link rel="stylesheet" href="scroll.css">
  <link rel="stylesheet" href="foliage.css">
  <link rel="stylesheet" href="timerr.css">
  <link rel="stylesheet" href="advantageSliderr.css">
  <link rel="stylesheet" href="reviewss.css">
  <link rel="stylesheet" href="swiper/swiper.css">
  <link rel="stylesheet" href="feedbackkk.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tiny5&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="background-squares"></div>
  <header>
    <div class="logo">
      <a href="#!">
        <div class="logoDiv">
          <img src="image/minecraft-grass-cube.png" alt="" class="logotop">
          <h1>LAVANDACRAFT</h1>
        </div>
      </a>
    </div>
    <div class="burger" id="burger">
      <span></span>
      <span></span>
      <span></span>
    </div>
    <ul class="menu" id="menu">
      <li><a href="#!" data-slide="0" class="tableTask">ГЛАВНАЯ</a></li>
      <li><a href="#!" data-slide="1" class="tableTask">ИНФОРМАЦИЯ О СЕРВЕРЕ</a></li>
      <li><a href="#!" data-slide="2" class="tableTask">ЛИЧНОЕ</a></li>
    </ul>
  </header>
  <div class="allayBody">
    <div id="follower"></div>
  </div>
  <div class="slider">
    <div class="slider-slide slideActive">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6>ГЛАВНАЯ СТРАНИЦА</h6>
                <div class="block1Inside">
                  <div class="block1-text card">
                    <h1>Играй на самом лучшем сервере игры Minecraft за самую выгодную цену</h1>
                    <p>"LAVANDACRAFT - Это целый мир на ванильном сервере майнкрафт. Без гриферов, приватов или доната."</p>
                    <div class="countdown-container">
                      <p>До окончания акции осталось:</p>
                      <div class="countdown">
                        <div class="countdown-item">
                          <span id="days" class="countdown-value">00</span>
                          <span class="countdown-label">дней</span>
                        </div>
                        <div class="countdown-item">
                          <span id="hours" class="countdown-value">00</span>
                          <span class="countdown-label">часов</span>
                        </div>
                        <div class="countdown-item">
                          <span id="minutes" class="countdown-value">00</span>
                          <span class="countdown-label">минут</span>
                        </div>
                        <div class="countdown-item">
                          <span id="seconds" class="countdown-value">00</span>
                          <span class="countdown-label">секунд</span>
                        </div>
                      </div>
                    </div>
                    <div class="price-block">
                      <div class="old-price"><del>999 руб</del></div>
                      <div class="new-price">199 руб<span class="discount-badge">-80%</span></div>
                      <p>*оплата за месяц игры</p>
                    </div>
                    <div class="podrobFlex">
                      <a href="#!">Купить</a>
                    </div>
                  </div>
                  <div class="block2-text">
                    <img src="image/worldmine.png" alt="" class="elitra">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6> О НАШЕМ СЕРВЕРЕ</h6>
                <div class="block1Inside">
                  <div class="block2-text">
                    <div class="block1-text2 card">
                      <h1>Краткая информация о сервере</h1>
                      <p>
                        LAVANDACRAFT - уникальный Minecraft сервер с атмосферой провансальского лета.
                        Здесь вас ждёт много ивентов
                        Сообщество славится дружелюбными администраторами и активной помощью новичкам.
                        Присоединяйтесь к онлайн-комьюнити до 100 игроков и создайте свою историю в мире, где каждый закат
                        окрашен в оттенки лавандового неба!
                      </p>
                      <div class="podrobFlex">
                        <a href="#!">Купить</a>
                      </div>
                    </div>
                  </div>
                  <div class="column2">
                    <h1>Почему вы должны играть на нашем сервере?</h1>
                    <div class="advantageSlider-container">
                      <div class="arrow arrow-left"></div>
                      <div class="advantageSlider">
                        <div class="advantageSlide active">
                          <img src="image/richrich.png" alt="">
                          <div class="advantageSlide-content">
                            <h2>Платите только за игру</h2>
                            <p>На данном сервере нет привилегий и статусов за деньги</p>
                            <p>Все игроки на сервере равны.</p>
                          </div>
                        </div>
                        <div class="advantageSlide ">
                          <img src="image/whoooooh.webp" alt="">
                          <div class="advantageSlide-content">
                            <h2>Уникальный геймплей с улучшениями</h2>
                            <p>Сервер сохраняет дух классического Minecraft,
                              но с продуманными дополнениями (например, оптимизированный спавн,
                              сбалансированный гриферство, улучшенные фермы).</p>
                            <p>Нет разрушающих игру донатных привилегий — честная экономика и выживание.</p>
                          </div>
                        </div>
                        <div class="advantageSlide">
                          <img src="image/companyMine.webp" alt="">
                          <div class="advantageSlide-content">
                            <h2>Активное и дружелюбное комьюнити</h2>
                            <p>Модераторы следят за атмосферой, нет токсичности.</p>
                            <p>Регулярные ивенты (стройбаттлы, PvP-турниры, конкурсы), где игроки могут проявить себя.</p>
                          </div>
                        </div>
                        <div class="advantageSlide">
                          <img src="image/steammine.png" alt="">
                          <div class="advantageSlide-content">
                            <h2>Эксклюзивные механики</h2>
                            <p>Свои крафты, мобы или редкие биомы, которых нет на других серверах.</p>
                            <p>Например, «Лавандовые поля» — зона с особыми ресурсами или эффектами.</p>
                          </div>
                        </div>
                        <div class="advantageSlide">
                          <img src="image/golem.webp" alt="">
                          <div class="advantageSlide-content">
                            <h2>Стабильность и защита</h2>
                            <p>Античит, регулярные бэкапы, защита от лагов и гриферов.</p>
                            <p>Сервер работает 24/7 без лагов.</p>
                          </div>
                        </div>
                        <div class="advantageSlide">
                          <img src="image/minevibe.webp" alt="">
                          <div class="advantageSlide-content">
                            <h2>Своя легенда и стиль</h2>
                            <p>LavandaCraft — это не просто выживание, а мир с историей (например, сервер вдохновлен Провансом или магией).</p>
                            <p>Красивые постройки спавна, атмосферная музыка в лобби.</p>
                          </div>
                        </div>
                      </div>
                      <div class="arrow arrow-right"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6>ОТЗЫВЫ</h6>
                <div class="block1Inside">
                  <div class="column">
                    <div class="rowblock">

                      <div class="review card">
                        <div class="review-header">
                          <div class="avatar">👤</div>
                          <div class="review-info">
                            <div>
                              <h6>Иван Иванов</h6>
                            </div>
                            <div class="review-date">
                              <p>15.05.2023, 14:30</p>
                            </div>
                          </div>
                        </div>
                        <div class="review-text">
                          <p>Ваще сервер топчик! Давно такой искал.</p>
                        </div>
                        <div class="review-full" style="display:none">
                          <p>Чё то тут написано...</p>
                        </div>
                        <div class="review-footer">
                          <button class="like-btn">👍 <span class="like-count">5</span></button>
                          <button class="read-more standart-button">Читать полностью</button>
                        </div>
                      </div>
                      <div class="review card">
                        <div class="review-header">
                          <div class="avatar">👤</div>
                          <div class="review-info">
                            <div>
                              <h6>Пётр Петров</h6>
                            </div>
                            <div class="review-date">
                              <p>18.04.2025, 16:28</p>
                            </div>
                          </div>
                        </div>
                        <div class="review-text">
                          <p>Интересный сервер для игры с друзьями.</p>
                        </div>
                        <div class="review-full" style="display:none">
                          <p>Советую всем!</p>
                        </div>
                        <div class="review-footer">
                          <button class="like-btn">👍 <span class="like-count">5</span></button>
                          <button class="read-more standart-button">Читать полностью</button>
                        </div>
                      </div>
                    </div>
                    <div class="rowblock">

                      <div class="review card">
                        <div class="review-header">
                          <div class="avatar">👤</div>
                          <div class="review-info">
                            <div>
                              <h6>Анна Чюпикова</h6>
                            </div>
                            <div class="review-date">
                              <p>28.04.2025, 20:04</p>
                            </div>
                          </div>
                        </div>
                        <div class="review-text">
                          <p>Давно искала похожий сервер.</p>
                        </div>
                        <div class="review-full" style="display:none">
                          <p>Админам печеньки.</p>
                        </div>
                        <div class="review-footer">
                          <button class="like-btn">👍 <span class="like-count">5</span></button>
                          <button class="read-more standart-button">Читать полностью</button>
                        </div>
                      </div>
                      <div class="review card">
                        <div class="review-header">
                          <div class="avatar">👤</div>
                          <div class="review-info">
                            <div>
                              <h6>Никита Шпаков</h6>
                            </div>
                            <div class="review-date">
                              <p>01.05.2025, 14:40</p>
                            </div>
                          </div>
                        </div>
                        <div class="review-text">
                          <p>За такую цену очень даже неплохо!</p>
                        </div>
                        <div class="review-full" style="display:none">
                          <p>Играйте! Не пожалеете!</p>
                        </div>
                        <div class="review-footer">
                          <button class="like-btn">👍 <span class="like-count">5</span></button>
                          <button class="read-more standart-button ">Читать полностью</button>
                        </div>
                      </div>
                    </div>
                    <button class="standart-button">Читать все отзывы</button>
                  </div>
                </div> <!-- закрытие block1Inside -->
              </div> <!-- закрытие columnblock -->
            </div> <!-- закрытие block1 -->
          </div> <!-- закрытие swiper-slide -->
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6>ОБРАТНАЯ СВЯЗЬ</h6>
                <div class="block1-text2 card">
                  <form id="feedbackForm" onsubmit="submitForm(event)">
                    <div class="rowblock">
                      <div class="form-group">
                        <label for="title">Почему вы решили написать?</label>
                        <input type="text" id="title" name="title" placeholder="Введите заголовок"
                          oninput="validateTitle()" maxlength="100">
                        <div id="titleError" class="error"></div>
                        <div id="titleCounter" class="success"></div>
                      </div>
                      <div class="form-group">
                        <label for="name">Ваше имя / Ник</label>
                        <input type="text" id="name" name="name" placeholder="Введите имя / Ник (1-16)"
                          oninput="validateName()" maxlength="16">
                        <div id="nameError" class="error"></div>
                        <div id="nameCounter" class="success"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" id="email" name="email" placeholder="example@mail.com"
                        oninput="validateEmail()">
                      <div id="emailError" class="error"></div>
                    </div>
                    <div class="form-group">
                      <label for="message">Сообщение</label>
                      <textarea id="message" name="message" rows="5" placeholder="До 255 слов"
                        oninput="validateMessage()"></textarea>
                      <div id="messageError" class="error"></div>
                      <div id="messageCounter" class="success"></div>
                    </div>
                    <button type="submit" id="submitBtn" class="buttonCheck" disabled>Отправить</button>
                  </form>
                  <div id="successMessage" style="display: none; margin-top: 20px; padding: 15px; background: #dff0d8; color: #3c763d; border-radius: 4px;">
                    Сообщение успешно отправлено!
                  </div>
                </div>
              </div>
              <div class="onfooter"></div>
              <footer>
                <div class="socials">
                  <div class="social">
                    <p>Телефон: +79216036187</p>
                    <p>Почта: lavandacraft@gmail.com</p>
                    <p>Адрес: ул. Брамса, 9</p>
                  </div>
                  <div class="social">
                    <p>Соц. сети:</p>
                    <div class="flex-icons">
                      <img src="image/free-icon-vk-2504953.png" class="icons" alt="">
                      <img src="image/free-icon-telegram-2504941.png" class="icons" alt="">
                      <img src="image/free-icon-discord-2504896.png" class="icons" alt="">
                    </div>
                  </div>
                </div>
                <p>Copyright © lavandacraft 2025. Все права защищены. Сервер LAVANDACRAFT не относится к Mojang Studios.</p>
              </footer>
            </div>
          </div>
        </div> <!-- закрытие swiper-wrapper -->
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div> <!-- закрытие swiper-container -->
    </div> <!-- закрытие slider-slide -->
    <div class="slider-slide">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6>ИНФОРМАЦИЯ О СЕРВЕРЕ</h6>
                <div class="block1Inside">

                  <div class="block1-text card">
                    <h2>Информация о сервере</h2>
                    <p>
                      LAVANDACRAFT - уникальный Minecraft сервер с атмосферой провансальского лета.
                      Здесь вас ждут магические биомы, PvP-арены с особыми механиками, экономическая система и творческие
                      постройки в стиле прованса.
                      На сервере реализована система магии на основе лавандовых кристаллов, доступны паркур-трассы,
                      мини-игры и рыболовные соревнования.
                      Сообщество славится дружелюбными администраторами и активной помощью новичкам.
                      Присоединяйтесь к онлайн-комьюнити до 100 игроков и создайте свою историю в мире, где каждый закат
                      окрашен в оттенки лавандового неба!
                    </p>
                  </div>
                  <div class="block2-text">
                    <div class="block1-text2 card">
                      <h2>Как зайти?</h2>
                      <p>
                        После покупки проходки на любое количество времени вам будет предоставлен адрес на наш сервер.
                        (Если вам по какой нибудь причине не удаётся зайти на сервер после покупки проходки, то незамедлительно напишите
                        об этом в форме обратной связи.)
                      </p>
                    </div>
                    
                    <div class="block1-text2 card">
                      <h2>Можно ли зайти на сервер не с официального лаунчера?</h2>
                      <p>
                        Да, т. к. наш сервер поддерживает и другие лаунчеры.
                      </p>
                    </div>
                  </div>
                </div> <!-- закрытие block1Inside -->
              </div> <!-- закрытие columnblock -->
            </div> <!-- закрытие block1 -->
          </div> <!-- закрытие swiper-slide -->
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="columnblock">
              <div class="block1">
                <h6>Онлайн</h6>
                <div class="block1Inside">
                  <div class="block1-text card">
                    <h2>Общий онлайн:</h2>
                    <h2><?php echo $onlineOnline; ?>/<?php echo $onlineMax; ?></h2>
                    <h2>Игроки онлайн:</h2>
                    <ul>
                      <?php
                      if (!empty($playersList)) {
                        foreach ($playersList as $player) {
                          echo '<li>' . htmlspecialchars($player['name']) . '</li>';
                        }
                      } else {
                        echo '<li>Нет игроков онлайн</li>';
                      }
                      ?>
                    </ul>
                  </div>
                </div> <!-- закрытие block1Inside -->
              </div> <!-- закрытие block1 -->
            </div> <!-- закрытие columnblock -->
          </div> <!-- закрытие swiper-slide -->
          <div class="swiper-slide">
            <div class="onheader"></div>
            <div class="block1">
              <div class="columnblock">
                <h6>ЛУЧШИЕ ПОСТРОЙКИ НА СЕРВЕРЕ</h6>
                <div class="block1Inside">
                  <div class="columnblock">
                    <div class="upscale card">
                      <img src="image/postroika1.jpg" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>SashaSigmaBoss</p>
                      </div>
                    </div>
                    <div class="upscale card">
                      <img src="image/postroika2.webp" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>Demiurge</p>
                      </div>
                    </div>
                  </div>
                  <div class="columnblock">
                    <div class="upscale card">
                      <img src="image/postroika3.jpg" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>L0VAI</p>
                      </div>
                    </div>
                    <div class="upscale card">
                      <img src="image/postroika4.webp" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>FOXS1DE</p>
                      </div>
                    </div>
                  </div>
                  <div class="columnblock">
                    <div class="upscale card">
                      <img src="image/postroika5.webp" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>KEXIST</p>
                      </div>
                    </div>
                    <div class="upscale card">
                      <img src="image/postroika6.webp" class="postroika" alt="">
                      <div>
                        <p>Строитель:</p>
                        <p>Marmok</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- закрытие swiper-wrapper -->
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
      </div> <!-- закрытие swiper-container -->
    </div> <!-- закрытие slider-slide -->
    <div class="slider-slide">
      <div class="flexcolumn">
        <div class="onheader"></div>
        <div class="columnblock">
          <div class="block1">
            <h6>ЛИЧНЫЙ КАБИНЕТ</h6>
            <div class="block1Inside">
              <div class="profile-block card">
                <div class="profileinfo">
                  <?php if ($user): ?>
                    <p>
                    <h1>Имя:</h1> <?= htmlspecialchars($user['name']) ?></p>
                    <p>
                    <h1>Ник:</h1> <?= htmlspecialchars($user['username']) ?></p>
                    <p>
                    <h1>Логин:</h1> <?= htmlspecialchars($user['login']) ?></p>
                    <p>
                    <h1>О себе:</h1> <?= htmlspecialchars($user['bio']) ?></p>
                    <a href="?logout=1"><button class="formbutton closebutton">Выйти</button></a>
                  <?php else: ?>
                    <h2>Войдите на свой аккаунт</h2>
                    <button class="formbutton loginbutton" onclick="document.getElementById('loginModal').style.display='flex'">Войти</button>
                    <button class="formbutton registerbutton" onclick="document.getElementById('registerModal').style.display='flex'">Зарегистрироваться</button>
                  <?php endif; ?>
                </div>
              </div>
            </div> <!-- закрытие block1Inside -->
          </div> <!-- закрытие block1 -->
        </div> <!-- закрытие columnblock -->
      </div>





      <!-- Модальное окно входа -->
      <div id="loginModal" class="modal">
        <div class="modal-content card">
          <span onclick="document.getElementById('loginModal').style.display='none'" style="float:right;cursor:pointer">&times;</span>
          <h2>Вход</h2>
          <form method="POST">
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <?php if (isset($login_error)): ?>
              <p class="error"><?= $login_error ?></p>
            <?php endif; ?>
            <button type="submit" name="login_btn" class="formbutton loginbutton">Войти</button>
          </form>
        </div>
      </div>

      <div id="registerModal" class="modal">
        <div class="modal-content card">
          <span onclick="document.getElementById('registerModal').style.display='none'" style="float:right;cursor:pointer">&times;</span>
          <h2>Регистрация</h2>
          <form method="POST">
            <input type="text" name="name" placeholder="Имя" required>
            <input type="text" name="username" placeholder="Ник" required>
            <input type="text" name="login" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <textarea name="bio" placeholder="О себе"></textarea>
            <button type="submit" name="register" class="formbutton registerbutton">Зарегистрироваться</button>
            <?php if (isset($register_error)): ?>
              <p class="error"><?= $register_error ?></p>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Закрытие модального окна при клике вне его
    window.onclick = function(event) {
      if (event.target.className === 'modal') {
        event.target.style.display = 'none';
      }
    }
  </script>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/lenis@1.1.14/dist/lenis.min.js"></script>
<script src="jsjs.js"></script>
<script src="allay.js"></script>
<script src="scroll.js"></script>
<script src="foliage.js"></script>
<script src="timerr.js"></script>
<script src="advantageSlider.js"></script>
<script src="reviews.js"></script>
<script src="swiper/swiper.js"></script>
<script src="feedbackkk.js"></script>

</html>