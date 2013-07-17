
<meta name="fragment" content="!" /> 
<meta name="Keywords" content="Dee Store - Chuyên bán buôn, bán lẻ hàng VNXK. Mẫu mã đa dạng phong phú, cập nhật thường xuyên,áo sơ mi, áo phông, quần jean, áo khoác, deestore">
<meta name="robots" content="INDEX,FOLLOW,ALL" />
<meta name="language" content="Vietnamese,English" />
<meta name="author" content="Deestore.vn" />
<meta name="copyright" content="Copyright (C) 2010-2013 Deestore.com" />
<meta name="revisit-after" content="1 day" />
<meta name="document-rating" content="General" />
<meta name="document-distribution" content="Global" />
<meta name="distribution" content="Global" />
<meta name="area" content="Shop Online" />
<meta name="placename" content="vietnam" />
<meta name="resource-type" content="Document" />
<meta name="owner" content="Deestore.vn" />
<meta name="classification" content="quan ao, ao somi, ao khoac, ao phong,
      quan soc, quan jean, quan nam, deestore,quần áo, áo sơmi, áo khoác,áo phông,quần sooc, quần jean, quần bò,quần nam , Vietnam" />
<meta name="rating" content="All" />
<meta name="csrf-token" content="Initial" />
<link rel="shortcut icon" href="http://image.spreadshirt.com/image-server/v1/products/19396512/views/1,width=42,height=42.png">
<link rel="search" type="application/opensearchdescription+xml" title="Deestore shop" href="/opensearch.xml">
<link href="/Media/Css/Layer.css" rel="stylesheet" />
<script src="/Media/JavaScript/jquery/jquery.min.js"></script>
<script src="/Media/JavaScript/jquery/jquery.session.js"></script>

<div id="fb-root"></div>
<?php

// random render token key
function rand_md5($length) {
    $max = ceil($length / 31);
    $random = '';
    for ($i = 0; $i < $max; $i++) {
        $random .= md5(microtime(true) . mt_rand(10000, 90000));
    }
    return substr($random, 0, $length);
}

$_SESSION["_%tokenKey"] = rand_md5(30);
echo "<script>" . "$('meta[name=csrf-token]').attr('content','". $_SESSION["_%tokenKey"] . "')" . "</script>";
?>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark || (function(c) {
        var f = window, d = document, l = f.location.protocol == "https:" ? "https:" : "http:", z = c.name, r = "load";
        var nt = function() {
            f[z] = function() {
                (a.s = a.s || []).push(arguments)
            };
            var a = f[z]._ = {
            }, q = c.methods.length;
            while (q--) {
                (function(n) {
                    f[z][n] = function() {
                        f[z]("call", n, arguments)
                    }
                })(c.methods[q])
            }
            a.l = c.loader;
            a.i = nt;
            a.p = {
                0: +new Date};
            a.P = function(u) {
                a.p[u] = new Date - a.p[0]
            };
            function s() {
                a.P(r);
                f[z](r)
            }
            f.addEventListener ? f.addEventListener(r, s, false) : f.attachEvent("on" + r, s);
            var ld = function() {
                function p(hd) {
                    hd = "head";
                    return["<", hd, "></", hd, "><", i, ' onl' + 'oad="var d=', g, ";d.getElementsByTagName('head')[0].", j, "(d.", h, "('script')).", k, "='", l, "//", a.l, "'", '"', "></", i, ">"].join("")
                }
                var i = "body", m = d[i];
                if (!m) {
                    return setTimeout(ld, 100)
                }
                a.P(1);
                var j = "appendChild", h = "createElement", k = "src", n = d[h]("div"), v = n[j](d[h](z)), b = d[h]("iframe"), g = "document", e = "domain", o;
                n.style.display = "none";
                m.insertBefore(n, m.firstChild).id = z;
                b.frameBorder = "0";
                b.id = z + "-loader";
                if (/MSIE[ ]+6/.test(navigator.userAgent)) {
                    b.src = "javascript:false"
                }
                b.allowTransparency = "true";
                v[j](b);
                try {
                    b.contentWindow[g].open()
                } catch (w) {
                    c[e] = d[e];
                    o = "javascript:var d=" + g + ".open();d.domain='" + d.domain + "';";
                    b[k] = o + "void(0);"
                }
                try {
                    var t = b.contentWindow[g];
                    t.write(p());
                    t.close()
                } catch (x) {
                    b[k] = o + 'd.write("' + p().replace(/"/g, String.fromCharCode(92) + '"') + '");d.close();'
                }
                a.P(2)
            };
            ld()
        };
        nt()
    })({
        loader: "static.olark.com/jsclient/loader0.js", name: "olark", methods: ["configure", "extend", "declare", "identify"]});
    /* custom configuration goes here (www.olark.com/documentation) */
    olark.identify('4451-300-10-2388');/*]]>*/</script><noscript><a href="https://www.olark.com/site/4451-300-10-2388/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->

<script type="text/javascript">
    olark.configure("locale.welcome_title", "Webmaster Chat");
    olark.configure("locale.chatting_title", "Trợ giúp trực tuyến");
    olark.configure("locale.unavailable_title", "Trợ giúp trực tuyến: Offline");
    olark.configure("locale.busy_title", "Trợ giúp trực tuyến: Busy");
    olark.configure("locale.away_message", "Hiện tại chúng tôi đang vắng mặt. Hãy gửi 1 bức thư cho chúng tôi. Chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất");
    olark.configure("locale.loading_title", "Khởi chạy Olark...");
    olark.configure("locale.welcome_message", "Chào mừng bạn.  Site đang trong quá trình xây dựng -> Hiện tại bạn sẽ được kết nối tới Webmaster");
    olark.configure("locale.busy_message", "All of our representatives are with other customers at this time. We will be with you shortly.");
    olark.configure("locale.chat_input_text", "Nhập tại đây và nhấn ENTER để trò chuyện");
    olark.configure("locale.name_input_text", " Tên của bạn");
    olark.configure("locale.email_input_text", "Email của bạn");
    olark.configure("locale.offline_note_message", "Chúng tôi tạm thời không trực tuyến, Gửi thư cho chúng tôi");
    olark.configure("locale.send_button_text", "Gửi");
    olark.configure("locale.offline_note_thankyou_text", "Cảm ơn bạn đã gửi lời nhăn. Chúng tôi sẽ liên lạc lại với bạn sớm nhất");
    olark.configure("locale.offline_note_error_text", "Bạn phải nhập các trường yêu cầu");
    olark.configure("locale.offline_note_sending_text", "Đang gửi...");
    olark.configure("locale.operator_is_typing_text", "Đang nhập...");
    olark.configure("locale.operator_has_stopped_typing_text", "Đã ngừng nhập");
    olark.configure("locale.introduction_error_text", "Please leave a name and email address so we can contact you in case we get disconnected");
    olark.configure("locale.introduction_messages", "Welcome, just fill out some brief information and click \"Start chat\" to talk to us");
    olark.configure("locale.introduction_submit_button_text", "Bắt đầu trò chuyện");
    olark.configure("locale.disabled_input_text_when_convo_has_ended", "Kết thúc phiên trò chuyện. refesh cho cuộc trò chuyện mới");
    olark.configure("locale.disabled_panel_text_when_convo_has_ended", "Cuộc nói chuyện này đã kết thúc, nhưng tất cả các bạn cần làm là làm mới trang để bắt đầu một phiên trò chuyện mới!");
    olark.configure("locale.name_input_text", "Pre-Chat Survey TÊN");
    olark.configure("locale.phone_input_text", "Pre-Chat Survey ĐIỆN THOẠI");
    olark.configure("locale.email_input_text", "Pre-Chat Survey EMAIL");
    olark.configure("locale.send_button_text", "Pre-Chat Survey SENDBUTTON");
</script>
<style>
    #habla_window_div #habla_expanded_div,#habla_window_div.habla_window_div_base{
        font-family: arial !important;
    }
</style>