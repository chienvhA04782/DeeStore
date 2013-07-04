
<div class="wrapperTopSearch">
    <div class="inside">
        <div class="boxContentSearch">
            <label>BRAND</label>
            <select style="width: 200px" id="brandPSelect">
            </select>
        </div>
        <div class="boxContentSearch">
            <label>SIZE</label>
            <select style="width: 200px" id="sizeSelect">
            </select>
        </div>
        <div class="boxContentSearch">
            <label>COLOR</label>
            <select style="width: 200px" id="colorSelect">
                <option>-- Not Yet --</option>
            </select>
        </div>
    </div>
</div>

<div class="contentProductShow">
    <h2 id="titleProductForm" title="" style="font-weight: normal; font-size: 14px; display: inline-block"></h2> - <span id="totalNumberProduct"></span> 
    <div class="contentpagingtop">
        <div class="sleft"> 
            <select>
                <option>value 1</option>
                <option>value 2</option>
                <option>value 3</option>
            </select>
        </div>
        <?php 
            echo "";
        ?>
        <!--        <div class="sright">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                </div>-->
    </div>
    <div class="productContent"> 
        <!--        <div class="items">
                    <div class="sizeH">
                        <label>
                            SIZE: X | XL | 1 | 2A
                        </label>
                    </div>
                    <div class="opImage">
                        <div class="salepercent">
                            <span>-12</span> 
                        </div>
                        <img src="Media/Upload/Product/natural-project-7386-01857-1-catalog.jpg">
                    </div> 
                    <div>
                        <label class="opnameProduct">
                            ÁO SƠ MI NAM
                        </label>
                        <label class="opDescription">
                            Description
                        </label>
                        <label class="opOldPrice">
                            600.000 VNĐ
                        </label>
                        <label class="opCurrentPrice">
                            450.000 VNĐ
                        </label>
                        <label class="deestoreKy">
                            DEESTORE
                        </label>
                    </div>
                </div>-->
    </div>
    <div class="contentpagingtop">
        <div class="sleft"> 
            <select>
                <option>value 1</option>
                <option>value 2</option>
                <option>value 3</option>
            </select>
        </div>
        <!--        <div class="sright">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                </div>-->
    </div>
</div>

<?php
require '../Model/Connect.php';
require '../Model/ProductBrand.php';
require '../Model/ProductSize.php';

// Load combox search form
//BRAND
$productBrand = new ProductBrand();
$resultBrand = $productBrand->FetchAllProductBrand();
echo "<script type='text/javascript'>";
while ($rowBrand = mysqli_fetch_array($resultBrand)) {
    echo "$('select#brandPSelect').append('<option value=\'" . $rowBrand["ProductBrandID"] . "\'>" . $rowBrand["ProductBrandName"] . "</option>');";
}
echo "</script>";

// SIZE
$productSize = new ProductSize();
$resultSize = $productSize->FetchAllProductSize();
echo "<script type='text/javascript'>";
while ($rowSize = mysqli_fetch_array($resultSize)) {
    echo "$('select#sizeSelect').append('<option value=\'" . $rowSize["ProductSizeID"] . "\'>" . $rowSize["ProductSizeNumber"] . "</option>');";
}
echo "</script>";
?>