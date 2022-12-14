<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$body = [
    'title' => 'Settings',
    'desc'   => 'CMSNT Panel',
    'keyword' => 'cmsnt, CMSNT, cmsnt.co,'
];
$body['header'] = '
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/theme/monokai.css">
<!-- ckeditor -->
<script src="'.BASE_URL('public/ckeditor/ckeditor.js').'"></script>
<!-- Select2 -->
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="'.BASE_URL('public/AdminLTE3/').'plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
';
$body['footer'] = '
<!-- bootstrap color picker -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- CodeMirror -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/codemirror.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/css/css.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/xml/xml.js"></script>
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- Select2 -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/select2/js/select2.full.min.js"></script>
<script>
$(function () {
    $(".select2").select2()
    $(".select2bs4").select2({
        theme: "bootstrap4"
    });
});
</script>
';
require_once(__DIR__.'/../../models/is_admin.php');
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url_admin('home');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
    if (isset($_POST['SaveSettings'])) {
        if ($CMSNT->site('status_demo') != 0) {
            die('<script type="text/javascript">if(!alert("Kh??ng ???????c d??ng ch???c n??ng n??y v?? ????y l?? trang web demo.")){window.history.back().location.reload();}</script>');
        }
        foreach ($_POST as $key => $value) {
            $CMSNT->update("settings", array(
                'value' => $value
            ), " `name` = '$key' ");
        }
        die('<script type="text/javascript">if(!alert("L??u th??nh c??ng !")){window.history.back().location.reload();}</script>');
    } ?>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12">
                    <div class="card card-dark card-tabs">
                        <div class="card-header p-0 pt-1 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill"
                                        href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                                        aria-selected="true">TH??NG TIN CHUNG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#tab-notification" role="tab"
                                        aria-controls="tab-notification" aria-selected="false">TH??NG B??O</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#tab-auto-bank" role="tab"
                                        aria-controls="tab-auto-bank" aria-selected="false">BANK AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#tab-auto-momo" role="tab" aria-controls="tab-auto-bank"
                                        aria-selected="false">MOMO AUTO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill"
                                        href="#tab-nap-the" role="tab" aria-controls="tab-nap-the"
                                        aria-selected="false">N???P TH??? AUTO</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-three-home-tab">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" class="form-control" name="title"
                                                        value="<?=$CMSNT->site('title');?>" placeholder="VD: CMSNT.CO">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Description</label>
                                                    <input type="text" class="form-control" name="description"
                                                        value="<?=$CMSNT->site('description');?>"
                                                        placeholder="VD: H??? th???ng b??n m?? ngu???n website MMO uy t??n">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Keywords</label>
                                                    <input type="text" class="form-control" name="keywords"
                                                        value="<?=$CMSNT->site('keywords');?>"
                                                        placeholder="VD: cmsnt, b??n code, source code mmo">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Author</label>
                                                    <input type="text" class="form-control" name="author"
                                                        value="<?=$CMSNT->site('author');?>" placeholder="VD: CMSNT">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>M??u ch??? ?????o website:</label>
                                                    <div class="input-group my-colorpicker2">
                                                        <input type="text" name="theme_color"
                                                            value="<?=$CMSNT->site('theme_color');?>"
                                                            class="form-control">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-square"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>M??u ph??? website:</label>
                                                    <div class="input-group my-colorpicker1">
                                                        <input type="text" name="theme_color2"
                                                            value="<?=$CMSNT->site('theme_color2');?>"
                                                            class="form-control">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-square"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2bs4" name="status">
                                                        <option <?=$CMSNT->site('status') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option <?=$CMSNT->site('status') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Ch???n OFF website s??? b???t ch??? ????? b???o tr??, ADMIN truy c???p b??nh
                                                        th?????ng.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Update</label>
                                                    <select class="form-control select2bs4" name="status_update">
                                                        <option
                                                            <?=$CMSNT->site('status_update') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option
                                                            <?=$CMSNT->site('status_update') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Ch???n OFF website s??? t???t ch??? ????? c???p nh???t phi??n b???n t??? ?????ng</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Status Captcha</label>
                                                    <select class="form-control select2bs4" name="status_captcha">
                                                        <option
                                                            <?=$CMSNT->site('status_captcha') == 1 ? 'selected' : '';?>
                                                            value="1">ON
                                                        </option>
                                                        <option
                                                            <?=$CMSNT->site('status_captcha') == 0 ? 'selected' : '';?>
                                                            value="0">
                                                            OFF
                                                        </option>
                                                    </select>
                                                    <i>Ch???n OFF website s??? t???t Captcha ch???ng SPAM</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Th???i gian l??u phi??n ????ng
                                                        nh???p</label>
                                                    <input type="number" class="form-control" name="session_login"
                                                        value="<?=$CMSNT->site('session_login');?>"
                                                        placeholder="Nh???p th???i gian l??u phi??n ????ng nh???p">
                                                    <i>T??nh b???ng gi??y (<?=$CMSNT->site('session_login');?> =
                                                        <?=timeAgo2($CMSNT->site('session_login'));?>)</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>ON/OFF Login Tr?????c Khi Xem Website</label>
                                                    <select class="form-control select2bs4" name="sign_view_product">
                                                        <option
                                                            <?=$CMSNT->site('sign_view_product') == 1 ? 'selected' : '';?>
                                                            value="1">ON</option>
                                                        <option
                                                            <?=$CMSNT->site('sign_view_product') == 0 ? 'selected' : '';?>
                                                            value="0">OFF</option>
                                                    </select>
                                                    <i>N???u b???n ch???n ON, kh??ch s??? ph???i ????ng nh???p v??o m???i c?? th??? xem ???????c
                                                        d???ch v??? c???a b???n.</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Font Family</label>
                                                    <input type="text" class="form-control" name="font_family"
                                                        value="<?=$CMSNT->site('font_family');?>">
                                                    <i><a type="button" data-toggle="modal"
                                                            data-target="#modal-hd-font-family" href="#">H?????ng d???n</a>
                                                        thay font website</i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                            </div> 
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Script Header</label>
                                                    <textarea id="codeMirrorDemo"
                                                        placeholder="Ch???a code live chat ho???c jquery trang tr??..."
                                                        name="javascript_header"><?=$CMSNT->site('javascript_header');?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Script Footer</label>
                                                    <textarea id="codeMirrorDemo2"
                                                        placeholder="Ch???a code live chat ho???c jquery trang tr??..."
                                                        name="javascript_footer"><?=$CMSNT->site('javascript_footer');?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Th??ng b??o ngo??i trang ch???</label>
                                                    <textarea id="notice_home" name="notice_home"><?=$CMSNT->site('notice_home');?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>L??u Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-notification" role="tabpanel"
                                    aria-labelledby="tab-notification">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Lo???i th??ng b??o</label>
                                            <select class="form-control select2bs4" name="type_notification">
                                                <option <?=$CMSNT->site('type_notification') == 'telegram' ? 'selected' : '';?>
                                                    value="telegram">Telegram
                                                </option>
                                                <option <?=$CMSNT->site('type_notification') == 'gmail' ? 'selected' : '';?>
                                                    value="gmail">Gmail
                                                </option>
                                            </select>
                                            <i>H??? th???ng s??? g???i th??ng b??o khi c?? ????n h??ng m???i.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token Telegram (<a target="_blank" href="https://cmsnt.vn/2022/05/huong-dan-cau-hinh-bot-thong-bao-qua-telegram/">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="token_telegram"
                                                value="<?=$CMSNT->site('token_telegram');?>"
                                                placeholder="5323330732:AAFpurxAdW9vGGPE_cZ2gU_kDP-__kAsOVc">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Chat ID Telegram (<a target="_blank" href="https://cmsnt.vn/2022/05/huong-dan-cau-hinh-bot-thong-bao-qua-telegram/">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="chat_id_telegram"
                                                value="<?=$CMSNT->site('chat_id_telegram');?>"
                                                placeholder="-788267800">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">N???i dung th??ng b??o</label>
                                            <textarea name="text_notification" class="form-control"><?=$CMSNT->site('text_notification');?></textarea>
                                            <ul>
                                                <li><b>{domain}</b> => T??n website c???a qu?? kh??ch.</li>
                                                <li><b>{service_name}</b> => T??n d???ch v??? kh??ch h??ng mua.</li>
                                                <li><b>{service_pack_name}</b> => T??n g??i d???ch v??? kh??ch h??ng mua.</li>
                                                <li><b>{amount}</b> => S??? l?????ng kh??ch h??ng mua.</li>
                                                <li><b>{price}</b> => S??? ti???n kh??ch h??ng thanh to??n.</li>
                                                <li><b>{url}</b> => Link/ID c???n t??ng.</li>
                                                <li><b>{note}</b> => Ghi ch?? c???a kh??ch h??ng.</li>
                                            </ul>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left btn-block m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>L??u Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-auto-bank" role="tabpanel"
                                    aria-labelledby="tab-auto-bank-tab">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_bank">
                                                <option <?=$CMSNT->site('status_bank') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$CMSNT->site('status_bank') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Ch???n OFF h??? th???ng s??? t???m d???ng auto bank.</i>
                                        </div>
                                        <div class="form-group">
                                            <label>Ng??n h??ng</label>
                                            <select class="form-control select2bs4" name="type_bank">
                                                <?php foreach ($config_listbank as $bank) {?>
                                                <option <?=$CMSNT->site('type_bank') == $bank ? 'selected' : '';?>
                                                    value="<?=$bank;?>"><?=$bank;?>
                                                </option>
                                                <?php }?>
                                            </select>
                                            <i>Ch???n ng??n h??ng b???n c???n s??? d???ng auto.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token Bank (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="token_bank"
                                                value="<?=$CMSNT->site('token_bank');?>"
                                                placeholder="Nh???p token ng??n h??ng">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">S??? t??i kho???n (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="stk_bank"
                                                value="<?=$CMSNT->site('stk_bank');?>"
                                                placeholder="Nh???p s??? t??i kho???n ng??n h??ng c???n Auto">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">M???t kh???u Internet Banking (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-bank" href="#">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="mk_bank"
                                                value="<?=$CMSNT->site('mk_bank');?>"
                                                placeholder="Nh???p m???t kh???u internet banking">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">N???i dung n???p</label>
                                            <input type="text" class="form-control" name="prefix_autobank"
                                                value="<?=$CMSNT->site('prefix_autobank');?>"
                                                placeholder="Ti???n t??? n???i dung n???p ti???n">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi ch?? n???p ti???n</label>
                                            <textarea id="recharge_notice"
                                                name="recharge_notice"><?=$CMSNT->site('recharge_notice');?></textarea>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left btn-block m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>L??u Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-auto-momo" role="tabpanel" aria-labelledby="tab-auto-momo">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_momo">
                                                <option <?=$CMSNT->site('status_momo') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$CMSNT->site('status_momo') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Ch???n OFF h??? th???ng s??? t???m d???ng auto momo.</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Token MOMO (<a type="button"
                                                    data-toggle="modal" data-target="#modal-hd-auto-momo" href="#">Xem
                                                    h?????ng d???n</a>)</label>
                                            <input type="text" class="form-control" name="token_momo"
                                                value="<?=$CMSNT->site('token_momo');?>"
                                                placeholder="Nh???p token v?? momo">
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>L??u Ngay</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-nap-the" role="tabpanel" aria-labelledby="tab-nap-the">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status_napthe">
                                                <option <?=$CMSNT->site('status_napthe') == 0 ? 'selected' : '';?>
                                                    value="0">OFF
                                                </option>
                                                <option <?=$CMSNT->site('status_napthe') == 1 ? 'selected' : '';?>
                                                    value="1">ON
                                                </option>
                                            </select>
                                            <i>Ch???n OFF h??? th???ng s??? t???m d???ng n???p th???.</i>
                                        </div>
                                        <div class="form-group">
                                            <label>Partner ID (<a type="button" data-toggle="modal"
                                                    data-target="#modal-hd-nap-the" href="#">Xem h?????ng d???n</a>)</label>
                                            <input type="text" name="partner_id_card"
                                                value="<?=$CMSNT->site('partner_id_card');?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Partner Key (<a type="button" data-toggle="modal"
                                                    data-target="#modal-hd-nap-the" href="#">Xem h?????ng d???n</a>)</label>
                                            <input type="text" name="partner_key_card"
                                                value="<?=$CMSNT->site('partner_key_card');?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ph?? N???p Th???</label>
                                            <input type="text" class="form-control" name="ck_napthe"
                                                value="<?=$CMSNT->site('ck_napthe');?>"
                                                placeholder="Nh???p ph?? n???p th??? n???u c?? n???p th???">
                                            <i>????? <?=$CMSNT->site('ck_napthe');?> t???c kh??ch n???p 100.000?? s??? ???????c
                                                <?=format_currency(100000 - 100000 * $CMSNT->site('ck_napthe') / 100);?></i><br>
                                            <i>????? ph?? = 0 n???u qu?? kh??ch mu???n c???ng cho user gi???ng th???c nh???n t???i h??? th???ng
                                                card24h.com</i>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ghi ch?? n???p th???</label>
                                            <textarea id="notice_napthe"
                                                name="notice_napthe"><?=$CMSNT->site('notice_napthe');?></textarea>
                                        </div>
                                        <button name="SaveSettings" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>L??u Ngay</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hd-nap-the">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">H?????NG D???N T??CH H???P N???P TH??? C??O</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>B?????c 1: Truy c???p v??o <a target="_blank"
                            href="https://card24h.com/account/login">https://card24h.com/account/login</a> <b>????ng
                            k??</b> t??i kho???n v?? <b>????ng nh???p</b>.</li>
                    <li>B?????c 2: Truy c???p v??o <a target="_blank" href="https://card24h.com/merchant/list">????y</a> ????? ti???n
                        h??nh t???o API m???i.</li>
                    <li>B?????c 3: Nh???p l???n l?????t nh?? sau:</li>
                    <b>T??n m?? t???:</b> => <i><?=check_string($_SERVER['SERVER_NAME']);?> - SHOPCLONE6</i><br>
                    <b>Ch???n v?? giao d???ch:</b> => <i>VND</i><br>
                    <b>Ki???u:</b> => <i>GET</i><br>
                    <b>???????ng d???n nh???n d??? li???u (Callback Url):</b> => <i><?=BASE_URL('api/card.php');?></i><br>
                    <b>?????a ch??? IP (kh??ng b???t bu???c):</b> => <i></i><br>
                    <li>B?????c 4: Th??m th??ng tin k???t n???i v?? <a target="_blank" href="https://zalo.me/0947838128">inbox</a>
                        ngay cho Admin ????? duy???t API.</li>
                    <li>B?????c 5: Copy Partner ID d??n v??o ?? Partner ID tr??n h??? th???ng.</li>
                    <li>B?????c 6: Copy Partner Key d??n v??o ?? Partner Key tr??n h??? th???ng.</li>
                </ul>
                <h4 class="text-center">Ch??c qu?? kh??ch th??nh c??ng <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">????ng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-auto-bank">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">H?????NG D???N T??CH H???P N???P TI???N T??? ?????NG QUA NG??N H??NG</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>B?????c 1: Truy c???p v??o <a target="_blank"
                            href="https://api.web2m.com/Register.html?ref=113">????y</a> ????? <b>????ng k??</b> t??i kho???n v??
                        <b>????ng nh???p</b>.
                    </li>
                    <li>B?????c 2: Ch???n ng??n h??ng b???n mu???n k???t n???i Auto, sau ???? nh???n v??o n??t <b>Th??m t??i kho???n {t??n ng??n
                            h??ng}</b>.</li>
                    <li>B?????c 3: Nh???p ?????y ????? th??ng tin ????ng nh???p Internet Banking c???a b???n v??o form ????? ti???n h??nh k???t n???i.
                    </li>
                    <li>B?????c 4: Nh???n v??o <b>L???y Token</b> sau ???? check email ????? copy <b>Token</b> v???a l???y.</li>
                    <li>B?????c 5: D??n <b>Token</b> v??o ?? <b>Token Bank</b> trong website c???a b???n.</li>
                    <li>B?????c 6: Nh???p s??? t??i kho???n c???a b???n v???a k???t n???i v??o ?? <b>S??? t??i kho???n</b>.</li>
                    <li>B?????c 7: Nh???p m???t kh???u Internet Banking v??o ?? <b>M???t kh???u Internet Banking</b> v?? nh???n l??u.</li>
                    <li>B?????c 8: Quay l???i <a target="_blank" href="https://api.web2m.com/Home/nangcap">????y</a> v?? ti???n
                        h??nh gia h???n g??i Bank m?? b???n c???n d??ng ????? b???t ?????u s??? d???ng Auto.</li>
                </ul>
                <p>H?????ng d???n b???ng Video xem t???i <a target="_blank"
                        href="https://www.youtube.com/watch?v=N8CuOJTD6l8">????y</a>.</p>
                <h4 class="text-center">Ch??c qu?? kh??ch th??nh c??ng <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">????ng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-auto-momo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">H?????NG D???N T??CH H???P N???P TI???N T??? ?????NG QUA V?? MOMO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>H?????ng d???n l???y Token MOMO ????? c??i Auto.</p>
                <ul>
                    <li>B?????c 1: Truy c???p v??o <a target="_blank"
                            href="https://api.web2m.com/Register.html?ref=113">????y</a> ????? <b>????ng k??</b> t??i kho???n v??
                        <b>????ng nh???p</b>.
                    </li>
                    <li>B?????c 2: Ch???n ng??n h??ng b???n mu???n k???t n???i Auto, sau ???? nh???n v??o n??t <b>Th??m t??i kho???n MoMo</b>.
                    </li>
                    <li>B?????c 3: Nh???p ?????y ????? th??ng tin ????ng nh???p MoMo c???a b???n v??o form ????? ti???n h??nh k???t n???i.</li>
                    <li>B?????c 4: Nh???n v??o <b>L???y Token</b> sau ???? check email ????? copy <b>Token</b> v???a l???y.</li>
                    <li>B?????c 5: D??n <b>Token</b> v??o ?? <b>Token MOMO</b> trong website c???a b???n v?? nh???n L??u.</li>
                    <li>B?????c 6: Quay l???i <a target="_blank" href="https://api.web2m.com/Home/nangcap">????y</a> v?? ti???n
                        h??nh gia h???n g??i MOMO v?? b???t ?????u s??? d???ng Auto.</li>
                    <li>H?????ng d???n b???ng Video xem t???i <a target="_blank"
                            href="https://www.youtube.com/watch?v=5WRqOmxzBPc">????y</a>.</li>
                </ul>
                <h4 class="text-center">Ch??c qu?? kh??ch th??nh c??ng <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">????ng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hd-font-family">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">H?????NG D???N THAY FONT WEBSITE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>B?????c 1: Truy c???p v??o <a target="_blank"
                            href="https://fonts.google.com/">https://fonts.google.com/</a> t??m v?? ch???n FONT qu?? kh??ch
                        c???n thay.</li>
                    <li>B?????c 2: Qu?? kh??ch nh???n v??o FONT qu?? kh??ch ch???n sau ???? ????? ?? b??n tay ph???i m??n h??nh c?? ?? <b>Use on
                            the web</b>.</li>
                    <li>B?????c 3: Qu?? kh??ch t??ch v??o <b>
                            < link>
                        </b> v?? copy to??n b??? d??? li???u trong ??.</li>
                    <li>B?????c 4: Qu?? kh??ch ch??n d??? li???u ???? copy ph??a tr??n v??o ?? <b>Script Header</b> tr??n website qu??
                        kh??ch.</li>
                    <li>B?????c 5: Qu?? kh??ch nh??n v??o ?? <b>CSS rules to specify families</b> - Copy 1 d??ng
                        <b>font-family</b> qu?? kh??ch mu???n ch???n v?? d??n v??o ?? tr??n (kh??ng b???t bu???c thao t??c n??y, tu??? nhu
                        c???u).
                    </li>
                </ul>
                <h4 class="text-center">Ch??c qu?? kh??ch th??nh c??ng <img
                        src="https://i.pinimg.com/736x/c4/2c/98/c42c983e8908fdbd6574c2135212f7e4.jpg" width="45px;">
                </h4>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">????ng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
CKEDITOR.replace('notice_home');
CKEDITOR.replace("notice_napthe");
CKEDITOR.replace("recharge_notice");
</script>
<script>
$(function() {
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo2"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})
</script>
<?php
require_once(__DIR__.'/footer.php');
?>