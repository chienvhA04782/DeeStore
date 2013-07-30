<header>
    <div class="logo">
        <?php
        session_start();
        if ($_SESSION['userName'] == "") {
//            echo '<META http-equiv="refresh" content="0;URL=../../../AdminLogin.html">';
            header( 'Location: ../../' ) ;
            return;
        }
        ?>
    </div>
    <div id="logout">
        <div align="center">
            <div id="logout_icon">
                <a href="../../Model/BLLAccountManager.php?logout=true">
                    <img width="25" border="0" height="25" alt="big_logout" src="../../Media/Images/Icons/big_logout.png">
                </a>
            </div>
            <span class="spanLogout">
                <a href="../../Model/BLLAccountManager.php?logout=true">
                    <span class="logOut">Thoát</span>
                </a>
            </span>
        </div>
    </div>
    <div id="settings">
        <div align="center">
            <div id="settings_icon">
                <a href="javascript:void(0);">
                    <img width="25" border="0" height="26" alt="big_settings" src="../../Media/Images/Icons/big_settings.png">
                </a>
                <span class="spanSettings">

                    <a href="javascript:void(0);">
                        <span class="settings">Cài đặt</span>
                    </a>
                </span>
            </div>
        </div>
    </div>
    <div id="users">
        <div align="center">
            <div id="users_icon">
                <a href="../Account/ChangePassword.php">
                    <img width="24" border="0" height="26" alt="big_users" src="../../Media/Images/Icons/changePassword.png">
                </a>
            </div>
            <span class="spanUsers">
                <a href="../Account/ChangePassword.php">
                    <span class="users">Đổi Mật Khẩu</span>
                </a>
            </span>
        </div>
        <br>
    </div>
    <div id="about">
        <div align="center">
            <div id="about_icon">
                <a href="javascript:void(0);">
                    <img width="24" border="0" height="26" alt="big_users" src="../../Media/Images/Icons/about.png">
                </a>
            </div>
            <span class="spanAbout">
                <a href="javascript:void(0);">
                    <span class="about">Giới thiệu</span>
                </a>
            </span>
        </div>
        <br>
    </div>
    <div class="wellcomePersonal">
        <div id="hello" class="bodytext">
            Chào! 
            <a href="javascript:void(0);">Administrator</a>
            ,
            <img width="22" border="0" height="25" alt="user_icon" src="../../Media/Images/Icons/user.png">
            <br>
        </div>
        <div class="happyGreetings">
            <marquee behavior="scroll" scrollamount="3" direction="left">------------Chúc bạn có một ngày mới vui vẻ!------------</marquee>
        </div>
    </div>
    <div id="arrows"></div>
</header>