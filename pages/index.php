<?php
require_once("../core/library.php")

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Audiovisuaali - Penkkarit</title>
      <link rel="icon" href="../src/img/truck.png">
      <link rel="stylesheet" href="../src/css/style.css">
      <link rel="stylesheet" href="../src/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="main-padd">
            <div class="col-md-12 centered header-padd">
                <img src="../src/img/truck.png" height="120px">
                <h1 style="display: inline-block;">PENKKARIT</h1>
            </div>
            <div class="login container" id="login-tab">
              <div class="form-group row">
                  <label class="col-md-5 text-rgt"></label>
                  <h2>Kirjaudu</h2>
              </div>
              <form>
                <div class="form-group row">
                    <label class="col-md-5 text-rgt">Käyttäjänimi:</label>
                    <input type="email" class="form-control col-md-4 fix-margin-4-px" placeholder="Käyttäjänimi tai sähköpostiosoite">
                </div>
                <div class="form-group row">
                    <label class="col-md-5 text-rgt">Salasana:</label>
                    <input type="email" class="form-control col-md-4 fix-margin-4-px" placeholder="Salasana">
                </div>
                <div class="form-group row">
                    <div class="col-md-5">
                    </div>
                    <div clasS="col-md-5 create-btn">
                        <button class="button" onclick="adsdas()">Kirjaudu</button>
                    </div>
                </div>
              </form>
              <div class="row">
                  <div class="col-md-5"></div>
                  <div class="col-md-4 no-bystanders">
                    <h6 class="menu-interactivables" id="forgot-user1">Unohditko käyttäjäsi?</h6>
                    <h6 class="menu-interactivables" style="display: inline;" id="create-user-interactivables1">Luo käyttäjä!</h6>
                  </div>
              </div>
            </div>
            <div class="container create-accounta hidden" id="create-account">
              <div class="form-group row">
                  <label class="col-md-5 text-rgt"></label>
                  <h2>Rekisteröidy</h2>
              </div>
                <form>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Käyttäjänimi:</label>
                        <input type="text" class="form-control col-md-4 fix-margin-4-px" id="create-name" placeholder="Käyttäjänimi" >
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id="register-username-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Etunimi:</label>
                        <input type="text" class="form-control col-md-4 fix-margin-4-px" id="create-first-name" placeholder="Etunimi">
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id="register-firstname-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Sukunimi:</label>
                        <input type="text" class="form-control col-md-4 fix-margin-4-px" id="create-last-name" placeholder="Sukunimi">
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id="register-lastname-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Salasana:</label>
                        <input type="password" class="form-control col-md-4 fix-margin-4-px" id="create-password" placeholder="Salasana">
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id="register-password-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Salasana uudestaan:</label>
                        <input type="password" class="form-control col-md-4 fix-margin-4-px" id="create-password-re" placeholder="Salasana uudestaan">
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id="register-password-re-feedback"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Sähköpostiosoite:</label>
                        <input type="email" class="form-control col-md-4 fix-margin-4-px" id="create-email" placeholder="Sähköpostiosoite">
                        <div class="register-feedback col-md-4 offset-md-5 hidden" id=""></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Käyttäjätyppi:</label>
                        <div class="form-check form-check-inline col-md-4 kek">
                            <label class="form-check-label multicheck" for="inlineRadio1">Abi</label>
                              <label class="switch">
                                <input type="checkbox" id="user-type" toggled>
                                <span class="slider round"></span>
                              </label>
                            <label class="form-check-label multicheck" for="inlineRadio2">järjestäjä</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                        </div>
                        <div clasS="col-md-5 create-btn">
                            <button type=button class="button-not-able" id="create_button">Luo</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-4 no-bystanders">
                      <h6 class="menu-interactivables" id="forgot-user2">Unohditko käyttäjäsi?</h6>
                      <h6 class="menu-interactivables" style="display: inline;" id="login-btn-interactivables1">Kirjaudu sisään!</h6>
                    </div>
                </div>
            </div>
            <div class="reset-password hidden" id="reset-password">
                <div class="form-group row">
                    <label class="col-md-5 text-rgt"></label>
                    <h2>Palauta käyttäjä</h2>
                </div>
                <form>
                    <div class="form-group row">
                        <label class="col-md-5 text-rgt">Sähköpostiosoite:</label>
                        <input type="email" class="form-control col-md-4 fix-margin-4-px" placeholder="Sähköpostiosoite">
                    </div>
                </form>
                <div class="form-group row">
                    <div class="col-md-5">
                    </div>
                    <div clasS="col-md-5 create-btn">
                        <button class="button" onclick="adsdas()">Palauta</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-4 no-bystanders">
                      <h6 class="menu-interactivables" id="login-btn-interactivables2">Kirjaudu sisään?</h6>
                      <h6 class="menu-interactivables" style="display: inline;" id="create-user-interactivables2">Luo käyttäjä!</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <script src="../src/js/jquery.min.js"></script>
  <script src="../src/js/index.js"></script>
  <script src="../src/js/bootstrap.js"></script>
</body>
<!--<div class="footer">
  <div class="footer-padd">
  <h2>This is the footer</h2>
  </div>
</div>-->
</html>
