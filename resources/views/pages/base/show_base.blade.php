@extends('layouts.user')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>


    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/speciality.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Link JS -->
    <script src="js/script.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <div class="heading">
        <h1>Chuyên Khoa: Khám Thai</h1>
    </div>
    <!-- Specialities -->
    <div class="speciality-container">
        <div class="speciality-header">
            <div class="speciality-img">
                <img src="./img/hospital-hanoi.jpg" alt="speciality">
            </div>
            <h1 class="specility-name">Khoa Sản Phụ Khoa - Bệnh viện Đa khoa Quốc tế Greenwich HCM</h1>
            <h2 class="spciality-hotline">📞 Hotline: <a href="#">0283 6221 166</a></h2>
            <h2 class="spciality-hotline">🏡 Địa chỉ: <a href="#">208 Nguyễn Hữu Cảnh, Phường 22, Q. Bình Thạnh, TP. Hồ Chí Minh</a></h2>
            <h2 class="spciality-hotline">Trực Thuộc: <a href="#">Bệnh viện Đa khoa Quốc tế Greenwich Hospital</a></h2>
        </div>
        <div class="speciality-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Giới Thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="team-tab" data-toggle="tab" href="#team" role="tab" aria-controls="team" aria-selected="false">Đội Ngũ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="equipment-tab" data-toggle="tab" href="#equipment" role="tab" aria-controls="equipment" aria-selected="false">Cơ Sở Vật Chất Và Trang Thiết Bị</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show" id="description" role="tabpanel" aria-labelledby="description-tab">
                    Là chuyên khoa mũi nhọn hàng đầu tại bệnh viện Quốc tế Vinmec, khoa Sản phụ khoa quy tụ đội ngũ bác sĩ, điều dưỡng đến từ các bệnh viện phụ sản lớn tại thành phố Hồ Chí Minh, không chỉ có kinh nghiệm chuyên môn cao mà còn có sự hiểu biết và quan tâm sát sao đến tâm lý, trạng thái của từng sản phụ. Khoa Sản phụ khoa tại Bệnh viện Đa khoa Quốc tế Vinmec Central Park được đầu tư hệ thống phòng sinh hiện đại, mang đến cảm giác thoải mái thư giãn, giảm tối đa sự đau đớn cho sản phụ trong suốt quá trình vượt cạn.
                </div>
                <div class="tab-pane fade show" id="team" role="tabpanel" aria-labelledby="team-tab">
                <!--Team Section -->
                    <div class="team-section">
                        <section id="team" class="team team-bg py-5">
                            <div class="container">
                                <div class="section-title">
                                    <p class="main-team-subheading">Đội Ngũ</p>
                                    <p class="main-team-heading">Các Bác sĩ Trong Chuyên Khoa</p>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="member d-flex align-items-start">
                                            <div class="pic"><img src="./img/bac-si-chuyen-khoa-17102019-1.jpg" class="img-fluid" alt=""></div>
                                            <div class="member-info">
                                                <p class="member-heading">Dr. Nguyen Vinh</p>
                                                <span>Bác sĩ Trưởng Khoa</span>
                                                <p class="member-para">Quản lí và Điều hành các ca mổ quan trọng</p>
                                                <div class="social">
                                                    <a href=""><i class="fab fa-twitter team-icon"></i></a>
                                                    <a href=""><i class="fab fa-facebook-f team-icon"></i></a>
                                                    <a href=""><i class="fab fa-instagram team-icon"></i></a>
                                                    <a href=""> <i class="fab fa-linkedin-in team-icon"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4 mt-lg-0">
                                        <div class="member d-flex align-items-start">
                                            <div class="pic"><img src="./img/portrait/BS.PHẠM%20NGUYỄN%20VINH.png" class="img-fluid" alt=""></div>
                                            <div class="member-info">
                                                <p class="member-heading">Dr.Ds. Phung Khac Hung</p>
                                                <span>Chuyên gia về chẩn đoán và sàng lọc</span>
                                                <p class="member-para">Chuyên gia về chẩn đoán các ca thai bất thường</p>
                                                <div class="social">
                                                    <a href=""><i class="fab fa-twitter team-icon"></i></a>
                                                    <a href=""><i class="fab fa-facebook-f team-icon"></i></a>
                                                    <a href=""><i class="fab fa-instagram team-icon"></i></a>
                                                    <a href=""> <i class="fab fa-linkedin-in team-icon"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="member d-flex align-items-start">
                                            <div class="pic"><img src="./img/nha-khoa-uy-tin-nha-khoa-tan-dinh-tphcm.jpg" class="img-fluid" alt=""></div>
                                            <div class="member-info">
                                                <p class="member-heading">Dr. Wen Wu</p>
                                                <span>Bác Sĩ Mổ Chính</span>
                                                <p class="member-para">Chuyên các ca sinh khó và sinh non</p>
                                                <div class="social">
                                                    <a href=""><i class="fab fa-twitter team-icon"></i></a>
                                                    <a href=""><i class="fab fa-facebook-f team-icon"></i></a>
                                                    <a href=""><i class="fab fa-instagram team-icon"></i></a>
                                                    <a href=""> <i class="fab fa-linkedin-in team-icon"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-4">
                                        <div class="member d-flex align-items-start">
                                            <div class="pic"><img src="./img/nha-khoa-uy-tin-nha-khoa-tan-dinh-tphcm.jpg" class="img-fluid" alt=""></div>
                                            <div class="member-info">
                                                <p class="member-heading">Dr. Wen Wu</p>
                                                <span>Bác Sĩ Mổ Chính</span>
                                                <p class="member-para">Chuyên các ca sinh khó và sinh non</p>
                                                <div class="social">
                                                    <a href=""><i class="fab fa-twitter team-icon"></i></a>
                                                    <a href=""><i class="fab fa-facebook-f team-icon"></i></a>
                                                    <a href=""><i class="fab fa-instagram team-icon"></i></a>
                                                    <a href=""> <i class="fab fa-linkedin-in team-icon"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="wrapper">
                        <ul id="pagination">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="equipment" role="tabpanel" aria-labelledby="equipment-tab">
                    4 phòng khám, 2 phòng siêu âm với máy siêu âm GE hiện đại nhất hiện nay, chất lượng hình ảnh đẹp, có các tính năng siêu âm cắt lớp, siêu âm tạo khối dòng chảy giúp phát hiện các bất thường ở tim, ở não thai nhi.

                    Siêu âm 4D có thể điều chỉnh độ sáng tối, độ mịn, xóa nền tạo hình ảnh thai nhi sống động như được quay phim.

                    Siêu âm phụ khoa với đầu dò 4D giúp chẩn đoán các bệnh lý phức tạp của tử cung, buồng trứng khó thấy với đầu dò 2D. Với đầu dò này, hỗ trợ cho chọn nang trứng trong điều trị hiếm muộn.

                    Sử dụng các xét nghiệm tầm soát ung thư cổ tử cung hiện đại nhất, máy soi cổ tử cung kỹ thuật số tạo cho hình ảnh cực nét giúp phát hiện sớm các tổn thương tiền ung thư.

                    Máy cắt đốt hiện đại, có hệ thống hút khói giúp bác sĩ thao tác chính xác, môi trường an toàn, sạch.

                    3 phòng sinh thiết kế theo tiêu chuẩn hiện đại, thân thiện tạo sự thoải mái dễ chịu như ở nhà cho các sản phụ; được trang bị đầy đủ bàn sinh tiện nghi và các trang thiết bị đảm bảo an toàn cho thai phụ. Đặc biệt, khoa Sản phụ khoa Vinmec Central Park có ghế sinh cho các thai phụ không thể hay không muốn nằm sinh. Máy siêu âm tại phòng sinh có thể đo được vị trí đầu thai nhi trong khung chậu của mẹ giúp cho tiên lượng được sinh khó, hay dễ để bác sĩ lựa chọn phương pháp sinh thích hợp, an toàn cho mẹ và con. Mỗi phòng sinh đều có xe  chăm sóc sơ sinh hiện đại nhất, đầy đủ các thiết bị từ đèn giữ ấm, cân em bé, hệ thống đánh giá sức khỏe của bé (đo nhịp tim, nhịp thở, huyết áp, oxy trong máu),… Tất cả các thiết bị này được thiết kế gọn, tiện dụng, đẹp mắt.
                </div>
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="review-heading">REVIEWS</div>
                    <p class="mb-20">There are no reviews yet.</p>
                    <form class="review-form">
                        <div class="form-group">
                            <label>Your rating</label>
                            <div class="reviews-counter">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Your message</label>
                            <textarea class="form-control" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Name*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="" class="form-control" placeholder="Email Id*">
                                </div>
                            </div>
                        </div>
                        <button class="round-black-btn">Submit Review</button>
                    </form>
                </div>

                <!-- Pagination -->
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>
