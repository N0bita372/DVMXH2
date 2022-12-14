<?php if (!defined('IN_SITE')) {
    die('The Request Not Found');
}
$body = [
    'title' => 'Chỉnh sửa menu',
    'desc'   => 'CMSNT Panel',
    'keyword' => 'cmsnt, CMSNT, cmsnt.co,'
];
$body['header'] = ' 

';
$body['footer'] = '
<!-- bs-custom-file-input -->
<script src="'.BASE_URL('public/AdminLTE3/').'plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script> 
';
require_once(__DIR__.'/../../models/is_admin.php');
if (isset($_GET['id'])) {
    $id = check_string($_GET['id']);
    $row = $CMSNT->get_row("SELECT * FROM `menu` WHERE `id` = '$id' AND `status` = 1 ");
    if (!$row) {
        redirect(base_url_admin('menu-list'));
    }
} else {
    redirect(base_url_admin('menu-list'));
}
require_once(__DIR__.'/header.php');
require_once(__DIR__.'/sidebar.php');
require_once(__DIR__.'/nav.php');
?>
<?php
if (isset($_POST['save'])) {
    if ($CMSNT->site('status_demo') != 0) {
        die('<script type="text/javascript">if(!alert("Không được dùng chức năng này vì đây là trang web demo.")){window.history.back().location.reload();}</script>');
    }
    if (check_img('icon') == true) {
        unlink($row['icon']);
        $rand = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', 4);
        $uploads_dir = 'assets/storage/images/icon'.$rand.'.png';
        $tmp_name = $_FILES['icon']['tmp_name'];
        $addlogo = move_uploaded_file($tmp_name, $uploads_dir);
        if ($addlogo) {
            $CMSNT->update("menu", [
                'icon' => $uploads_dir
            ], " `id` = '".$row['id']."' ");
        }
    }
    $isCreate = $CMSNT->update("menu", [
        'menu_id'      => check_string($_POST['menu_id']),
        'name'      => check_string($_POST['name']),
        'href'      => check_string($_POST['href']),
        'target'    => isset($_POST['target']) ? check_string($_POST['target']) : '',
        'status'    => check_string($_POST['status'])
    ], " `id` = '".$row['id']."' ");
    if ($isCreate) {
        $Mobile_Detect = new Mobile_Detect();
        $CMSNT->insert("logs", [
            'user_id'       => $getUser['id'],
            'ip'            => myip(),
            'device'        => $Mobile_Detect->getUserAgent(),
            'createdate'    => gettime(),
            'action'        => "Chỉnh sửa menu (".$row['name']." ID ".$row['id'].") vào hệ thống."
        ]);
        die('<script type="text/javascript">if(!alert("Lưu thành công !")){location.href = "";}</script>');
    } else {
        die('<script type="text/javascript">if(!alert("Lưu menu thất bại, vui lòng thử lại!")){window.history.back().location.reload();}</script>');
    }
}

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Chỉnh sửa menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=BASE_URL('admin/');?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chỉnh sửa menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-6">
                    <div class="mb-3">
                        <a class="btn btn-danger btn-icon-left m-b-10" href="<?=base_url_admin('menu-list');?>"
                            type="button"><i class="fas fa-undo-alt mr-1"></i>Quay Lại</a>
                    </div>
                </section>
                <section class="col-lg-6">
                </section>
                <section class="col-lg-12 connectedSortable">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-bars mr-1"></i>
                                CHỈNH SỬA MENU
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i
                                        class="fas fa-expand"></i>
                                </button>
                                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên menu</label>
                                    <input type="text" class="form-control" value="<?=$row['name'];?>"
                                        placeholder="Nhập tên menu cần tạo" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Menu cha</label>
                                    <select class="form-control" name="menu_id" required>
 
                                        <option <?php $row['menu_id'] == 0 ? 'selected' : '';?> value="0">Menu cha</option>
                                        <?php foreach ($CMSNT->get_list("SELECT * FROM `menu` WHERE `status` = 1  AND `menu_id` = 0 ORDER BY `stt` ASC ") as $menu) {?>
                                        <option <?=$row['menu_id'] == $menu['id'] ? 'selected' : '';?> value="<?=$menu['id'];?>"><?=$menu['name'];?></option>
                                            <?php foreach ($CMSNT->get_list("SELECT * FROM `menu` WHERE `status` = 1  AND `menu_id` = '".$menu['id']."' ORDER BY `stt` ASC ") as $menu1) {?>
                                            <option <?=$row['menu_id'] == $menu1['id'] ? 'selected' : '';?> value="<?=$menu1['id'];?>">__<?=$menu1['name'];?></option>
                                                <?php foreach ($CMSNT->get_list("SELECT * FROM `menu` WHERE `status` = 1  AND `menu_id` = '".$menu1['id']."' ORDER BY `stt` ASC ") as $menu2) {?>
                                                <option value="<?=$menu2['id'];?>">____<?=$menu2['name'];?></option>
                                                <?php }?>
                                            <?php }?>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Liên kết</label>
                                    <input type="text" class="form-control" value="<?=$row['href'];?>"
                                        placeholder="Nhập địa chỉ liên kết cần tới khi click vào menu này" name="href"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Icon menu</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="icon">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="<?=base_url($row['icon']);?>" width="50px">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trạng thái</label>
                                    <select class="form-control" name="status" required>
                                        <option <?=$row['status'] == 1 ? 'selected' : '';?> value="1">Hiển thị</option>
                                        <option <?=$row['status'] == 0 ? 'selected' : '';?> value="0">Ẩn</option>
                                    </select>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" name="target" value="_blank"
                                        id="customCheckbox2" <?=$row['target'] == '_blank' ? 'checked' : '';?>>
                                    <label for="customCheckbox2" class="custom-control-label">Mở tab mới khi
                                        click</label>
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" name="save" class="btn btn-primary"><i
                                        class="fas fa-save mr-1"></i>LƯU NGAY</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


<?php
require_once(__DIR__.'/footer.php');
?>