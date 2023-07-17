
    <link rel="stylesheet" href="include/assets/css/input.css">

    <!-- <div class="home">
        <h4 onclick="location.href = 'include/index.php'"><span><img src="include/assets/img/svg/home.svg"></span>&nbsp;&nbsp;home</h4>
    </div> -->
    <h2>input stock</h2>
    <form action="config/save_stock.php" method="post">
        <table class="aisle">
            <tr>
                <th>aisle</th>
                <td><input type="number" name="aisle" id="1" oninput="ais(this)" class="aisle1" autofocus required></td>
            </tr>
            <tr>
                <th>bay</th>
                <td><input type="number" name="bay" id="1" class="by" onkeyup="by(this)" required></td>
            </tr>
            <tr>
                <th>location</th>
                <td><input type="text" value="" readonly id="loc"></td>
            </tr>
        </table>
        <div class="tab">
            <table class="bay">
                <thead>
                    <tr>
                        <th>barcode</th>
                        <th>prod cd</th>
                        <th>prod nm</th>
                        <th>act</th>
                    </tr>
                </thead>
                <tbody id="load">                            
                    <tr id="d1">
                        <!-- <td id="n"><?=$a?></td> -->
                        <td><input type="number" name="barcode[]" class="barcode1" id="1" oninput="barc(this)"></td>
                        <td><input type="number" name="prodcd[]" class="prodcd1" id="1" readonly></td>
                        <td><input type="text" name="prodnm[]" class="prodnm1" id="1" readonly></td>
                        <td>
                            <button type="button" class="del1" id="1" onclick="del(this)"><img src="include/assets/img/icons/remove.png"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="submit">
            <button type="button" class="add" id="1" onclick="add(this)">tambah</button> 
            <button type="submit" id="save" class="save">simpan</button>
        </div> <!-- end submit class -->
    </form>
