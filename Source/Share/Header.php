<!--<marquee behavior="scroll" direction="left" scrollamount="10"
         style="background-color: #dc2606;
         font-weight: bold;position:fixed;font-size: 16px;
         color:#fff; display: block; width: 100%; z-index: 90000; top: 40%">Website đang trong quá trình xây dựng bởi ACN</marquee>-->
<header id="heads">
    <div class="loadPanel" style="display: none"></div>
    <div class="content">
        <div class="topBar">
            <div class="logo">
                <h2 style="font-weight: normal" id="logos">MAKES YOU STYLE <h2 style="font-family: cursive; font-weight: normal">DEESTORE</span>
                        <br/><small>64b Phố Huế</small></h2>
            </div>
            <div class="search">
                <div class="menuTop">
                    <ul class="mnTop">
                        <li>
                            <a href="/About.php">
                                Thông tin
                            </a>
                        </li>
                        <li>
                            <a href="/Contact.php">
                                Liên hệ
                            </a>
                        </li>
                        <li>
                            <a href="/Contact.php">
                                Địa chỉ
                            </a>
                        </li>
                        <li>
                            <a href="/SiteMap.php">
                                SiteMap
                            </a>
                        </li>
                    </ul>
                </div>
                <div style="display: block;
                     margin-top: 50px;
                     width: 100%;">
                    <label>
                        <div style="float: left; margin-right: 2px;">
                            <input class="searchTopMain" placeholder="Nhập tên sản phẩm tìm kiếm" />
                        </div>
                        <div style="margin-left: 0; display: inline-block">
                            <span style="display: inline-block; margin-left: 3px; margin-top: 9px; position: absolute;">
                                <img src="/Media/Image/Icon/searchIcon.png" />
                            </span>
                            <button id="btnsearch">SEARCH</button>
                        </div>
                    </label>
                </div>
            </div>
            <div class="contentTopRight">
                Deestore Shop: Địa chỉ 64b - Phố Huế - Hà Nội<br/>
                Mobile: 0972999588
                <label style="display: block; margin-top: 20px;margin-right: -35px !important">
                    <div class="fb-like" data-href="http://deestore.vn" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true"></div>&nbsp;                    
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone" data-size="medium"></div>
                    <!-- Place this tag after the last +1 button tag. -->
                    <script type="text/javascript">
                        window.___gcfg = {lang: 'vi'};
                        (function() {
                            var po = document.createElement('script');
                            po.type = 'text/javascript';
                            po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0];
                            s.parentNode.insertBefore(po, s);
                        })();
                    </script>
                </label>
            </div>
        </div>
        <nav id="menu">
            <div class="contentMenu">
                <ul class="parent">
                    <li><a href="#!/Product">NEW</a></li>
                    <?php
                    $cate = new Categories();
                    $result = $cate->FetchCategoriesParent();
                    while ($row = mysqli_fetch_array($result)) {
                        echo '<li><a title="' . $row['CategoriesName'] . '" href="#!/Product/' . $row['CategoriesID'] . '/' . $row['CategoriesParentID'] . '/' . khongdau($row['CategoriesName']) . '">' . $row['CategoriesName'] . '</a></li>';
                    }
                    ?>
                    <li><a href="#" style="float: right;    background: none repeat scroll 0 0 #DC2606;
                           float: right;
                           font-family: cursive;
                           font-size: 12px;
                           font-weight: normal;
                           margin-right: -3px;">DEE STYLE !</a></li>
                </ul>
            </div>
        </nav>
        <div class="TopSiteMap">
            <a href="#">Trang Chủ</a> → <a href="#">Áo Khoác</a>
        </div>
    </div>

</header>