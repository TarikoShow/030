<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Личный кабинет пользователя</title>
    <style>
      .container {
        margin: auto;
        max-width: 1200px;
        font-size: 1.5rem;
        padding-left: 2rem;
        padding-right: 2rem;
        h1 {
          color: brown;
          text-align: center;
          margin-top: 2rem;
          margin-bottom: 2rem;
        }
      }
      input {
        font-size: 1.5rem;
        font-style: italic;
      }
      p>span:nth-child(1) {
        font-weight: 700;
        color: orange;
      }
        p>span:nth-child(2) {
        font-style: italic;
        color: brown;
      }
      .edit-btn {
        padding: 0.5rem;
        border: 1px solid green;
        background-color: green;
        border-radius: 8px;
        color: white;
        margin-left: 1rem;
      }
      .edit-btn:hover {
        background-color: darkgreen;
        border: 1px solid darkgreen;
        cursor: pointer;
      }
      .save-btn {
        padding: 0.5rem;
        border: 1px solid orange;
        background-color: orange;
        border-radius: 8px;
        color: white;
        margin-left: 1rem;
      }
      .save-btn:hover {
        background-color: darkorange;
        border: 1px solid darkorange;
        cursor: pointer;
      }
      .cancel-btn {
        padding: 0.5rem;
        border: 1px solid burlywood;
        background-color: burlywood;
        border-radius: 8px;
        color: white;
        margin-left: 1rem;
      }
      .cancel-btn:hover {
        background-color: darkolivegreen;
        border: 1px solid darkolivegreen;
        cursor: pointer;
      }
      .destroy {
        padding: 0.5rem;
        border: 1px solid red;
        background-color: red;
        border-radius: 8px;
        color: white;
        margin-left: 1rem;
      }
    </style>
  </head>
  <body>
    <section class="container">
      <h1>Личный кабинет</h1>
      <p>
        <span>Id: </span>
        <span><?php echo $_SESSION["id"]; ?></span>
        
      </p>
      <p>
        <span>Имя: </span>
        <span><?php echo $_SESSION["name"]; ?></span>
        <span class="edit-btn">Изменить</span>
        <span class="save-btn" hidden data-item="name">Сохранить</span>
        <span class="cancel-btn" hidden>Отменить</span>
      </p>
      <p>
        <span>Фамилия: </span>
        <span><?php echo $_SESSION["lastname"]; ?></span>
        <span class="edit-btn">Изменить</span>
        <span class="save-btn" hidden data-item="lastname">Сохранить</span>
        <span class="cancel-btn" hidden>Отменить</span>
      </p>
      <p>
        <span>Email: </span>
        <span><?php echo $_SESSION["email"]; ?></span>
      </p>
      <br>
      <a href="/archive/php/exit.php">Разлогиниться</a>
    </section>
    <script>
      let edit_buttons = document.querySelectorAll(".edit_btn")
      let save_buttons = document.querySelectorAll(".save_btn")
      let cancel_buttons = document.querySelectorAll(".cancel_btn")

      for (let i = 0; i < edit_buttons.length; i++) {

        let inputValue = edit_buttons[i].previousElementSibling.innerText;

        edit_buttons[i].addEventListener("click", () => {
          edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" value="${inputValue}">`;

          edit_buttons[i].hidden = true;
          save_buttons[i].hidden = false;
          cancel_buttons[i].hidden = false;
        })

          cancel_buttons[i].addEventListener("click", () => {
          edit_buttons[i].previousElementSibling.innerText = inputValue;

          edit_buttons[i].hidden = false;
          save_buttons[i].hidden = true;
          cancel_buttons[i].hidden = true;
        });

        save_buttons[i].addEventListener("click", async () => {
        let newInputValue = edit_buttons[i].previousElementSibling.firstElementChild.value;
          edit_buttons[i].previousElementSibling.innerText = newInputValue;

          edit_buttons[i].hidden = false;
          save_buttons[i].hidden = true;
          cancel_buttons[i].hidden = true;

          let formData = new FornData();
          formData.append("item", save_buttons[i].dataset.item);
          formData.append("value", newInputValue);

          let response = await fetch("/archive/php/lk_obr.php", {
          method: "POST",
          body: formData,
        });
        })
      }
    </script>
  </body>
</html>
