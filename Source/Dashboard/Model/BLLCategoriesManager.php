<?php

require 'Connect.php';
require 'DALCategories.php';
//Check remove cate
if (isset($_GET['reId']) && !empty($_GET['reId'])) {

    $cate = new DalCategories();
    $result = $cate->RemoveCategoriesById($_GET['reId']);
    if (!$result) {
        echo '<span id="errorMessages">Xóa danh mục sản phẩm với CategoriesId = "<font style="text-decoration: underline">' . $_GET['removeIdErrorMessage'] . '</font>" lỗi</span>';
        echo '<script type="text/javascript">$(document).ready(function (){$("#errorMessages").show();setTimeout(function(){$("#errorMessages").hide(1000);}, 3000);});</script>';
    }
}

if (!empty($_POST['typeRequest'])) {
    echo '<h1  class="titleCategories">Quản lý danh mục sản phẩm</h1>';
    echo '<div id="container">';
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
    echo '<thead><tr>';
    echo '<th>STT</th>';
    echo '<th>Mã</th>';
    echo '<th>Tên Danh Mục</th>';
    echo '<th>Danh Mục Cha</th>';
    echo '<th>Sắp xếp</th>';
    echo '<th></th>';
    echo '</tr></thead>';
    echo '<tbody>';
    $ssno = "";
    BuilderDataTableCategoriesManager(0);
    echo '</tbody></table></div>';
    echo '<script type="text/javascript" charset="utf-8">$(document).ready(function(){$("#example").dataTable({"sScrollY": "300px","bPaginate": true,"bScrollCollapse": true,"bS": true,"bJQueryUI": true,"sPaginationType": "full_numbers"});});</script>';
    return;
}


echo '<div id="contentCategoriesManager" style="overflow: hidden">';
echo '<h1  class="titleCategories">Quản lý danh mục sản phẩm</h1>';
echo '<div id="container">';
echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">';
echo '<thead><tr>';
echo '<th>STT</th>';
echo '<th>Mã</th>';
echo '<th>Tên Danh Mục</th>';
echo '<th>Danh Mục Cha</th>';
echo '<th>Sắp xếp</th>';
echo '<th></th>';
echo '</tr></thead>';
echo '<tbody>';
$ssno = "";
BuilderDataTableCategoriesManager(0);
echo '</tbody></table></div></div>';

function BuilderDataTableCategoriesManager($cateParrentId) {
    try {
        global $ssno;
        $cate = new DalCategories();
        $result = $cate->FetchCategoriesFollowParent($cateParrentId);
        $isno = 1;
        while ($rs = mysqli_fetch_array($result)) {
            if ($ssno == "") {
                $ssno = $isno;
            } else {
                $ssno = $ssno . "." . $isno;
            }
            echo '<tr>';
            echo '<td>' . $ssno . '</td>';
            echo '<td>' . $rs['CategoriesID'] . '</td>';
            echo '<td>' . $rs['CategoriesName'] . '</td>';
            echo '<td>' . FetchNameCategories($rs['CategoriesParentID']) . '</td>';
            echo '<td>' . $rs['CategoriesOrders'] . '</td>';
            echo '<td>
                <a href="javascript:void(0);" onclick="return removeCateById(' . $rs['CategoriesID'] . ');" title="Xóa danh mục: ' . $rs['CategoriesName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/Recycle.png"></a>
                <a href="javascript:void(0);" onclick="return editCateById(' . $rs['CategoriesID'] . ');" title="Sửa danh mục: ' . $rs['CategoriesName'] . '"><img class="dataTableEditRemove" src="../../Media/Images/Icons/edit_Pencil.png"></a>
                </td>';
            echo '</tr>';
            BuilderDataTableCategoriesManager($rs['CategoriesID']);
            if (lastIndexOf($ssno, ".") < 0) {
                $ssno = "";
            } else {
                $ssno = substr($ssno, 0, lastIndexOf($ssno, "."));
            }
            $isno++;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function FetchNameCategories($parrentId) {
    $cate = new DalCategories();
    $result = $cate->FetchCategoriesById($parrentId);
    if (mysqli_num_rows($result)) {
        while ($rs = mysqli_fetch_array($result)) {
            return $rs['CategoriesName'];
        }
    }
    return "Danh mục gốc";
}

function lastIndexOf($string, $item) {
    $index = strpos(strrev($string), strrev($item));
    if ($index) {
        $index = strlen($string) - strlen($item) - $index;
        return $index;
    }
    else
        return -1;
}

?>
