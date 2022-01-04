  <?php
  require_once('head.php');
  require_once('calculating.php');
  ?>

  <body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">

      <table width='100%' height='100%' cellspacing='0' cellpadding='0'>
        <tr>
          <td>
            <div align='center' style='font-size: 14px;font-weight: bold;'>Išankstinė sąskaita apmokėjimui Nr.
              <input type="text" name="invoice-number" value="<?= $_POST["invoice-number"] ?? "" ?>">
            </div>
          </td>
        </tr>
        <tr> </tr>
        <tr>
          <td>
            <p align='center' style='font-size: 12px;font-weight: bold;'>Sąskaitos išrašymo data: <input type="date" name="invoice-date" value="<?= $_POST["invoice-date"] ?? "" ?>"></p>
          </td>
        </tr>
      </table>

      <br>
      <br>
      <table align='left' border='0' cellpadding='0' cellspacing='0' style='font-size:12px;'>
        <tr>
          <td class="left-line" colspan="2">
            <p><strong>Pardavėjas: </strong></p>

            <hr>

          </td>
          <td>
          </td>
          <td colspan="2">
            <p><strong>Pirkėjas: </strong></p>
            <hr>
          </td>
        </tr>
        <tr>
          <td valign='top'><img class="qr-code" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/800px-QR_code_for_mobile_English_Wikipedia.svg.png"></td>
          <td valign='top' width='35%' style='font-size:12px; padding-top:15px;'>

            <div>UAB "Aplikacijų centras"</div>
            <div>Adresas: Ulonų g. 5, Vilnius</div>
            <div>Kodas: 304611351</div>
            <div>PVM kodas: LT100011111217</div>
            <div>Tel.: +37061222599</div>
            <div>El. p.: service@datalab.pro</div>
            <div>Bankas: „PAYSERA LT“, UAB
              IBAN: LT343500010008564909 ( EVP0410008564909 )</div>
          </td>

          <td valign='top' width='35%'>
          </td>

          <td valign='top' width='45%' style='font-size:12px;'>
            <p>Pavadinimas: <input class="input-field" type="text" name="client-name" value="<?= $_POST["client-name"] ?? "" ?>"></p>
            <p>Adresas: <input class="input-field" type="text" name="client-adress" value="<?= $_POST["client-adress"] ?? "" ?>"></p>
            <p>Kodas: <input class="input-field" type="text" name="client-code" value="<?= $_POST["client-code"] ?? "" ?>"></p>
            <p>PVM kodas: <input class="input-field" type="text" name="client-vat-code" value="<?= $_POST["client-vat-code"] ?? "" ?>"></p>
            <p>Tel.: <input class="input-field" type="text" name="client-phone" value="<?= $_POST["client-phone"] ?? "" ?>"></p>
            <p>El. paštas: <input class="input-field" type="text" name="client-el-post" value="<?= $_POST["client-el-post"] ?? "" ?>"></p>

          </td>
        </tr>


      </table>
      <p>Apmokėti iki : <input type="date" name="pay-term" value="<?= $_POST["pay-term"] ?? "" ?>"></p>
      <p class="red-alert"><b>DĖMESIO: </b>NAUJA SURENKAMOJI SĄSKAITA PAYSERA EVP10000201045125826597</p>

      <table class="main-table" width='100%' cellspacing='0' cellpadding='2'>
        <tr class="table-head">
          <th> Eilės Nr.</th>
          <th>Prekės/paslaugos pavadinimas</th>
          <th>Matas</th>
          <th>Kiekis</th>
          <th>Vieneto kaina be PVM, Eur</th>
          <th>Suma be PVM, Eur</th>
        </tr>
        <tr style="display:none;">
          <td colspan="*">
        <tr class="table-items">
          <td><input type="text" name="product1-number" value="<?= $_POST["product1-number"] ?? "" ?>"></td>
          <td><input type="text" name="product1-title" value="<?= $_POST["product1-title"] ?? "" ?>"></td>
          <td><input type="text" name="product1-unit" value="<?= $_POST["product1-unit"] ?? "" ?>"></td>
          <td><input type="text" name="product1-quantity" value="<?= $_POST["product1-quantity"] ?? "" ?>"></td>
          <td><input type="text" name="product1-price" value="<?= $_POST["product1-price"] ?? "" ?>"></td>
          <td><input type="text" name="product1-total" value="<?= $product1Total ?? "" ?>" disabled></td>
        </tr>

        <tr class="table-items" <?php if (!isset($_POST['new-line']) && !isset($_POST['product2-number'])) {
                                  echo 'style="display:none;"';
                                } ?>>
          <td><input type="text" name="product2-number" value="<?= $_POST["product2-number"] ?? "" ?>"></td>
          <td><input type="text" name="product2-title" value="<?= $_POST["product2-title"] ?? "" ?>"></td>
          <td><input type="text" name="product2-unit" value="<?= $_POST["product2-unit"] ?? "" ?>"></td>
          <td><input type="text" name="product2-quantity" value="<?= $_POST["product2-quantity"] ?? "" ?>"></td>
          <td><input type="text" name="product2-price" value="<?= $_POST["product2-price"] ?? "" ?>"></td>
          <td><input type="text" name="product2-total" value="<?= $product2Total ?? "" ?>" disabled></td>

        </tr>
        <tr>
          <td><button name="new-line" value="new">Pridėti dar produktą</button></td>
        </tr>
      </table>
      <table width='100%' cellspacing='0' cellpadding='2' border='0'>
        <tr>
          <td style='font-size:12px;width:50%;'><strong> </strong></td>
          <td>
            <table width='100%' cellspacing='0' cellpadding='2' border='0'>
              <tr>
                <td align='right' style='font-size:12px;'>Viso</td>
                <td align='right' style='font-size:12px;'><?= $total ?? 0 ?> €
                <td>
              </tr>
              <tr>
                <td align='right' style='font-size:12px;'>PVM(21.00%)</td>
                <td align='right' style='font-size:12px;'><?= $vat ?? 0 ?> €</td>
              </tr>
              <tr>

                <td align='right' style='font-size:12px;'><b>Iš viso</b></td>
                <td align='right' style='font-size:12px;'><b><?= $totalWithVat ?? 0 ?> €</b></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      <table width='100%' cellspacing='0' cellpadding='2'>
        <tr class="bottom line">
          <td width='33%' style='border-top:double medium #CCCCCC;font-size:12px;' valign='top'><b>Suma žodžiais:
          </td>
          <td class='table-bottom' width='33%' style='border-top:double medium #CCCCCC; font-size:12px;' align='center' valign='top'>
            <b>Avansas mokėjimui:</b>
          </td>

          <td class='table-bottom' align='right' valign='top' width='34%' style='border-top:double medium #CCCCCC;font-size:12px;'><b><?= $totalWithVat ?? 0 ?> €</b>
          </td>
        </tr>

      </table>
      <div>
        <input class='button-calculate' type="submit" name="calculate" value="Paskaičiuoti">

      </div>
      <br>
      <br>
      <?php
      if (isset($_POST['calculate'])) : ?>
        <div class='form-pdf-button'>
          <input class='pdf-button' type="submit" name="pdf" value="Formuoti PDF">
        </div>
      <?php endif ?>
    </form>
  </body>

  </html>