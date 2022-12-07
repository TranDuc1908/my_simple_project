<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<link rel="stylesheet" href="<?= URL_CSS ?>/style.css">
<?php include_once("./data/listProject.php"); global $title_page; $title_page = "My portfolio"; ?>

<div class="header" style="margin-top: -0.5rem;">
    <div class="header-top"></div>
    <div class="header-info px-3 d-sm-flex d-block justify-content-center mt-4">
        <div class="my-info">
            <div class="my-name">
                Trần Ngọc Đức
            </div>
            <div class="sub-my-name">
                PHP Developer
            </div>
        </div>

        <div class="my-avatar d-none d-sm-block mx-4">
            <div class="avatar-wrapper">
                <img src="<?= URL_IMAGE ?>/avatar02.jpg">
            </div>
        </div>

        <div class="social-link d-sm-block d-none">
            <div class=" d-flex">
                <div class="item">
                    <a target="_blank" target="nofollow" href="https://www.facebook.com/tranngocduccg/">
                        <i class="fab fa-facebook fa-4x"></i>
                    </a>
                </div>
                <div class="item ml-4">
                    <a href="<?= $topcvURL ?>">
                        <i class="fas fa-poll-h fa-4x"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="body container mt-4">
    <div class="body-section">

        <!-- basic info -->
        <div class="info-wrapper">
            <div class="font-weight-bold mt-2 ml-4 title">
                Thông tin cơ bản
            </div>
            <div class="text-wrapper">
                <div class="mt-4">
                    <div class="text">
                        <p class="fs-18 font-weight-500">Ngày sinh:</p>
                        <p class="ml-4">19/08/1996</p>
                    </div>
                    <div class="text">
                        <p class="fs-18 font-weight-500">Quê quán:</p>
                        <p class="ml-4">Hải Phòng</p>
                    </div>
                    <div class="text">
                        <p class="fs-18 font-weight-500">Địa chỉ hiện tại:</p>
                        <p class="ml-4">Cầu Giấy, Dịch vọng, Hà Nội</p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="text">
                        <p class="fs-18 font-weight-500">Email:</p>
                        <p class="ml-4">duc.php.unity@gmail.com</p>
                    </div>
                    <div class="text">
                        <p class="fs-18 font-weight-500">Số điện thoại:</p>
                        <p class="ml-4">0931191610</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- skills -->
        <div class="info-wrapper mt-4">
            <div class="font-weight-bold mt-2 ml-4 title">
                Các kỹ năng
            </div>
            <div class="text-wrapper">
                <div class="mt-4">
                    <div class="text">
                        <p>Frontend:</p>
                        <div>
                            <p>- Sử dụng khá CSS, HTML</p>
                            <p>- Biết sử dụng thư viện Jquery, Bootstrap, , AJAX</p>
                        </div>
                    </div>
                    <div class="text">
                        <p>Backend:</p>
                        <div>
                            <p>- Sử dụng tốt PHP</p>
                            <p>- Có kinh nghiệm về quản trị cơ sở dữ liệu MySQL</p>
                        </div>
                    </div>
                    <div class="text">
                        <p>Kỹ năng khác:</p>
                        <div>
                            <p>- Đọc hiểu tài liệu tiếng Anh</p>
                            <p>- Làm việc nhóm hoặc độc lập tốt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- experience -->
        <div class="info-wrapper mt-4">
            <div class="font-weight-bold mt-2 ml-4 title">
                Kinh nghiệm làm việc
            </div>
            <div class="text-wrapper d-block">
                <div class="mt-4 company">
                    <div class="title d-flex align-items-center mb-4">
                        <p class="mb-0">Công ty TNHH công nghệ truyền thông Explus</p> <span class="d-block">11/2020 - Hiện tại</span>
                    </div>

                    <div class="content">
                        <div class="d-flex mb-4">
                            <span class="font-weight-bold d-block w-10 w-mb-auto"> Chức vụ:</span>
                            <span class="font-color-blue font-weight-bold d-block"> Lập trình viên</span>
                        </div>
                        <div class="d-block d-sm-flex mb-4">
                            <p class="font-weight-bold w-10 w-mb-auto">Nhiệm vụ:</p>
                            <div>
                                <p>- Lập trình với PHP thuần</p>
                                <p>- Cắt giao diện từ trang mẫu hoặc file thiết kế có sẵn</p>
                                <p>- Cào dữ liệu từ những website khác</p>
                                <p>- Thiết kế Database cho website báo điện tử, mạng xã hội</p>
                                <p>- Tạo các chức năng đăng nhập/đăng ký, bình luận, tương tác bài viết, thông báo,...</p>
                                <p>- Tạo các module theo yêu cầu trong trang quản lý CMS</p>
                            </div>
                        </div>

                        <div class="projects">
                            <p class="font-weight-bold w-100">Các dự án gần đây:</p>

                            <div class="projects-wrapper">
                                <?php foreach ($listProjects as $project) { ?>
                                    <div class="item d-sm-flex d-block mb-3">
                                        <div class="project-image">
                                            <img src="<?= $project['image'] ?>">
                                        </div>
                                        <div class="project-right__side">
                                            <div class="url ml-4">
                                                <a target="_blank" rel="nofollow" href="<?= $project['url'] ?>">
                                                    <h3><?= $project['title'] ?></h3>
                                                </a>
                                            </div>

                                            <div class="mb-4 ml-4 d-sm-flex d-block align-items-center">
                                                <p class="mb-0 title">Mô tả dự án: </p>
                                                <p class="mb-0 ml-sm-2"><?= $project["description"] ?></p>
                                            </div>

                                            <div class="mb-4 ml-4">
                                                <h5>Số thành viên</h5>
                                                <div class="project-team ml-4">
                                                    <p class="mb-2">Tổng số người: <?= $project["team"]["quantity"] ?></p>
                                                    <?php foreach ($project["team"]["roles"] as $role) { ?>
                                                        <p class="ml-2">+ <?= $role ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="mb-4 ml-4">
                                                <h5>Vai trò trong dự án</h5>
                                                <div class="project-missions ml-4">
                                                    <?php foreach ($project["missions"] as $mission) { ?>
                                                        <p>- <?= $mission ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let w1 = $(".my-info").width();
    $(".social-link").width(w1);
</script>