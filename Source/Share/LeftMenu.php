<ul class="menuLeft">
    <?php
    $cate = new Categories();
    $menuLeftParent = $cate->FetchCategoriesParent();
    while ($row = mysqli_fetch_array($menuLeftParent)) {
        echo "<li><a class='menu-leftchild' title='" . $row['CategoriesName'] . "' href='#!/Product/" .
        $row['CategoriesID'] . "/" . $row['CategoriesParentID'] . "/" . khongdau($row['CategoriesName']) . "'>" .
        $row['CategoriesName'] . "</a>";
        // Bin Menu Left child grade I only
        $resultChild = $cate->FetchtchCategoriesChildByParent($row['CategoriesID']);
        echo "<ul>";
        while ($rows = mysqli_fetch_array($resultChild)) {
            echo "<li><a class='menu-leftChild' title='" . $rows['CategoriesName'] . "' href='#!/Product/" .
            $rows['CategoriesID'] . "/" . $rows['CategoriesParentID'] . "/" . khongdau($rows['CategoriesName']) . "'>" .
            $rows['CategoriesName'] . "</a></li>";
        }
        echo "</ul>";
        echo "</li>";
    }
    ?>
</ul>
<script>
    $("a.menu-leftChild").click(function() {
        $(".menuLeft li a").css("color", "#404040");
        $(this).css("color", "#dc2606");
    });

    $("a.menu-leftchild").click(function() {
        $(".menuLeft li a").css("color", "#404040");
        $(this).css("color", "#dc2606");
    });
</script>