<html>

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            background: #fff;
        }

        .wrapper {
            display: flex;
            width: 100vw;
            height: 380px;
            float: left;
        }

        .card {
            width: 450px;
            height: 270px;
            position: relative;
            opacity: 0.99;
            font-family: sans-serif;
            transition: 0.4s;
            background-color: maroon;
            border-radius: 2%;
            margin: 30px;
        }

        .card::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('../img/img.png');
            background-repeat: no-repeat;
            opacity: 0.2;
            z-index: 1;
            text-align: center;
            border-radius: 2%;

        }

        .card-header {
            margin: 0 10px;
            padding-top: 4px;
        }

        .card-header h5 {
            font-size: 20px;
            margin-top: 15px;
            border-bottom: 2px solid #fff;
            color: #fff;
        }

        .card-header p {
            color: #fff;
            margin: 5px 0;
        }

        .container {
            display: flex;
        }

        .side {
            position: relative;
            width: 50px;
            height: 160px;
        }

        .side h5 {
            -webkit-transform: rotate(270deg);
            position: absolute;
            width: 40px;
            top: 135px;
            font-size: 25px;
            color: #fff;
            font-weight: 700;
            letter-spacing: 5px;
            font-family: serif;
        }

        .profile {
            background-color: yellow;
            padding-bottom: 6px;
            width: 100%;
            border-bottom-right-radius: 2%;
        }

        .card-body {

            display: flex;
            margin: 10px 0;
            background-color: yellow;
            width: 100%;
        }

        .card-body h5 {
            font-size: 20px;
            z-index: 1;
        }

        .id-content {
            margin-top: 15px;
            padding-top: 10px;
        }

        .id-content h5 {
            text-transform: uppercase;
            font-style: italic;

        }

        .id-content h5 u {
            color: maroon;
        }

        .course {
            color: maroon;
            font-weight: 700;
        }

        img {
            width: 130px;
            height: 140px;
            margin: 5px;
            z-index: 1;
        }

        .card-footer {
            background-color: yellow;
            margin: 0 40px 4px 40px;
            display: flex;
            justify-content: space-between;
        }

        .card-footer p {
            font-size: 0.8em;
        }

        button {
            position: absolute;
            margin-bottom: 10px;
            margin-left: 150px;
        }

        /* card2 */

        .card-2 {
            width: 450px;
            height: 270px;
            position: relative;
            opacity: 0.99;
            font-family: sans-serif;
            transition: 0.4s;
            background-color: rgba(243, 234, 234, 0.667);
            border-radius: 2%;
            margin: 30px;
        }

        .card-header2 {
            height: 55px;
            border-bottom: 3px solid #000;
        }

        .card-header2 ul {
            position: absolute;
            margin: 10px;
            list-style-position: inside;
        }

        .card-header2 ul li {
            font-size: 0.7em;
        }

        .card-body2 .head {
            border-bottom: 3px solid #000;
            padding-left: 10px;
        }

        .card-body2 .head p {
            font-size: 0.7em;
            margin: 0 15px;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-content: center;
            border-bottom: 3px solid #000;
            margin: 2px 0;
            padding-bottom: 5px;
        }

        .table1 {
            width: 300px;
            border-collapse: collapse;
        }

        .table1,
        .table1 th,
        .table1 td {
            border: 1px solid black;
        }

        .table1 th {
            font-size: 0.8em;
        }

        .table1 td {
            font-size: 0.7em;
        }

        .card-footer-back {
            padding-top: 10px;
        }

        .card-footer-back h5 {
            position: relative;
            font-size: 0.6em;
        }

        .table3 {
            position: absolute;
            left: 330px;
        }

        .mb-1 {
            margin-bottom: 5px;
        }

        .d-flex {
            display: flex;
        }

        .w-100 {
            width: 100%;
        }

        .w-50 {
            width: 50%;
        }

        .text-end {
            float: right;
            padding-right: 15px;
        }


        @media print {

            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            button {
                display: none;
            }

            @page {
                size: landscape;

            }
        }
    </style>
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            /* this affects the margin in the printer settings */

        }
    </style>
</head>

<body onload="window.print();">
    <!-- onload="window.print();" -->
    <?php

include "../db/db.php";

$id = $_GET['id'];

$sql = "SELECT users.id, users.stud_id, users.first_name, users.last_name, id_form.img, id_form.middle_name, id_form.course, id_form.birthday, id_form.address, id_form.contact, id_form.contact_fname, id_form.contact_mname, id_form.contact_lname, id_form.contact_address, id_form.contact_no FROM users LEFT OUTER JOIN id_form ON users.stud_id = id_form.stud_id WHERE users.id >= '$id' && users.id <= '$id' ";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();

foreach($user as $row){

?>

    <div class="wrapper">
        <div class="card">
            <div class="card-header">
                <h5>Eastern Visayas State University</h5>
                <p>ORMOC CITY CAMPUS</p>
            </div>
            <div class="container">
                <div class="side">
                    <h5>STUDENT</h5>
                </div>
                <div class="profile">
                    <div class="card-body">
                        <img src="../upload/<?= $row['img']; ?>" alt="">
                        <div class="id-content">
                            <h5 class="mb-1"> <u>
                                    <?php

                                    $mname = $row['middle_name'];
                                    
                                    echo $row['first_name'] . ' ' . $mname[0] . '. ' . $row['last_name']; ?>
                                </u></h5>
                            <p class="course mb-1">
                                <?= $row['course']; ?>
                            </p>
                            <p class="mb-1">
                                <?= $row['address']; ?>
                            </p>
                            <p class="mb-1">
                                <?= $row['birthday']; ?>
                            </p>
                            <p>+63<?= $row['contact']; ?></p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <h4>
                            <?= $row['stud_id']; ?>
                        </h4>
                        <p>Signature</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-2">
            <div class="card-header2">
                <ul>
                    <li>This identification card is non-transferrable and is valid only to term last validated.</li>
                    <li>An affidavit of loss is required for a replacement of this ID if lost.</li>
                    <li>This ID must be worn at all times when inside the classroom.</li>
                </ul>
            </div>
            <div class="card-body2">
                <div class="head">
                    <h5>Contact person in case of emergency:</h5>
                    <p>
                        <?= $row['contact_fname'] . ' ' . $row['contact_mname'] . ' ' . $row['contact_lname']; ?>
                    </p>
                    <p>
                        <?= $row['contact_address']; ?>
                    </p>
                    <p> +63<?= $row['contact_no']; ?></p>
                </div>
                <div class="table-container">
                    <table class="table1">
                        <caption>Validity</caption>
                        <tr>
                            <th>SY</th>
                            <th>1st Sem</th>
                            <th>2nd Sem</th>
                            <th>Summer</th>
                        </tr>
                        <tr>
                            <td>2018-2019</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2019-2020</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2020-2021</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2021-2022</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2022-2023</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer-back">
                    <div class="d-flex">
                        <div class="w-100 text-end">
                            <span style="float: right; margin-bottom: 10px;">
                                <h5><u>DR. ROLANDO V. MUSCA</u></h5>
                                <h5>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCampus Director</h5>
                            </span>
                        </div>
                        <div class="w-50">
                            <span style="float: right; margin-top: 10px;">
                                <?php
                            include_once 'barcode128.php';
                            $product_id = $row['stud_id'];
                                echo "<p class='inline'>".bar128(stripcslashes($product_id))."</p>&nbsp&nbsp&nbsp&nbsp";
                            
                            ?>
                            </span>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php

}
?>

</body>

</html>