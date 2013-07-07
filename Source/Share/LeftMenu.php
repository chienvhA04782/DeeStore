<ul class="menuLeft">
    <?php
    $cate = new Categories();
    $menuLeftParent = $cate->FetchCategoriesParent();
    while ($row = mysqli_fetch_array($menuLeftParent)) {
        echo "<li><a class='mnitems-" . $row['CategoriesID'] . "' onclick='layerSite.activeMenu(" . '"mnitems-' . $row['CategoriesID'] . '"' . ");' title='" . $row['CategoriesName'] . "' href='#!/Product/" .
        $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "'>" .
        $row['CategoriesName'] . "</a>";
        // Bin Menu Left child grade I only
        $resultChild = $cate->FetchtchCategoriesChildByParent($row['CategoriesID']);
        echo "<ul>";
        while ($rows = mysqli_fetch_array($resultChild)) {
            echo "<li><a onclick='layerSite.activeMenuChild(" . '"menu-leftchild-' . $rows['CategoriesID'] . '",' . '"mnitems-' . $row['CategoriesID'] . '"' . ");' class='menu-leftchild-" . $rows['CategoriesID'] . "' title='" . $rows['CategoriesName'] . "' href='#!/Product/" .
            $rows['CategoriesID'] . "/" . $rows['CategoriesParentID'] . "/" . khongdau($rows['CategoriesName']) . "'>" .
            $rows['CategoriesName'] . "</a></li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    ?>
</ul>
<div class="wrapperTopSearch">
    <div class="titleSearch">
        <h2 class="p-search">TÌM KIẾM</h2>
    </div>
    <div class="inside">
        <div class="boxContentSearch">
            <input placeholder="Search" style="width: 172px"/>
        </div>
        <div class="boxContentSearch">
            <label>BRAND</label>
            <select id="brandPSelect">
            </select>
        </div>
        <div class="boxContentSearch">
            <label>SIZE</label>
            <select  id="sizeSelect">
            </select>
        </div>
        <div class="boxContentSearch">
            <label>COLOR</label>
            <select  id="colorSelect">
                <option>-- Not Yet --</option>
            </select>
        </div>
        <div class="searchBtn">
            <button>Tìm kiếm</button>
        </div>
    </div>
</div>
<?php
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