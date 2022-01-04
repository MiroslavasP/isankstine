<?php
require_once('head.php');
require_once('calculating.php');
?>


<body style='font-family:Tahoma;font-size:12px;color: #333333;background-color:#FFFFFF;'>
    <table width='100%' height='100%' cellspacing='0' cellpadding='0'>
        <tr>
            <td>
                <div align='center' style='font-size: 14px;font-weight: bold;'>Išankstinė sąskaita apmokėjimui Nr. <?= $_POST["invoice-number"] ?? "" ?> </div>
            </td>
        </tr>
        <tr>
            <td>
                <div align='center' style='font-size: 12px;font-weight: bold;'><?= $_POST["invoice-date"] ?? "" ?></div>
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
            <td><img class="qr-code" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/800px-QR_code_for_mobile_English_Wikipedia.svg.png"></td>
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
                <div>Pavadinimas: <?= $_POST["client-name"] ?? "" ?></div>
                <div>Adresas: <?= $_POST["client-adress"] ?? "" ?></div>
                <div>Kodas: <?= $_POST["client-code"] ?? "" ?></div>
                <p>PVM kodas: <?= $_POST["client-vat-code"] ?? "" ?></div>
                <p>Tel.: <?= $_POST["client-phone"] ?? "" ?></div>
                <p>El. paštas: <?= $_POST["client-el-post"] ?? "" ?></div>

            </td>
        </tr>


    </table>
    <p>Apmokėti iki : <?= $_POST["pay-term"] ?? "" ?></p>
    <p class="red-alert"><b>DĖMESIO: </b>NAUJA SURENKAMOJI SĄSKAITA PAYSERA EVP10000201045125826597</p>

    <table class="main-table" width='100%' cellspacing='0' cellpadding='2'>
        <tr class="table-head">
            <th> Eilės Nr.</th>
            <th>Prekės pavadinimas</th>
            <th>Matas</th>
            <th>Kiekis</th>
            <th>Vieneto kaina be PVM, Eur</th>
            <th>Suma be PVM, Eur</th>
        </tr>
        <tr style="display:none;">
            <td colspan="*">
        <tr class="table-items">
            <td><?= $_POST["product1-number"] ?? "" ?></td>
            <td><?= $_POST["product1-title"] ?? "" ?></td>
            <td><?= $_POST["product1-unit"] ?? "" ?></td>
            <td><?= $_POST["product1-quantity"] ?? "" ?></td>
            <td><?= $_POST["product1-price"] ?? "" ?></td>
            <td><?= $product1Total ?></td>

        </tr>
        <tr class="table-items">
            <td><?= $_POST["product2-number"] ?? "" ?></td>
            <td><?= $_POST["product2-title"] ?? "" ?></td>
            <td><?= $_POST["product2-unit"] ?? "" ?></td>
            <td><?= $_POST["product2-quantity"] ?? "" ?></td>
            <td><?= $_POST["product2-price"] ?? "" ?></td>
            <td><?= $product2Total ?></td>

        </tr>

        </td>
        </tr>
    </table>
    <table width='100%' cellspacing='0' cellpadding='2' border='0'>
        <tr>
            <td style='font-size:12px;width:50%;'><strong> </strong></td>
            <td>
                <table width='100%' cellspacing='0' cellpadding='2' border='0'>
                    <tr>
                        <td align='right' style='font-size:12px;'>Viso</td>
                        <td align='right' style='font-size:12px;'> <?= $total ?? 0 ?> €
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
    <?php if (isset($_POST['pdf'])) : ?>
        <br><br>
        <p><a href="index.php?id=1">Download PDF file</a></p>

    <?php endif ?>

</body>

</html>