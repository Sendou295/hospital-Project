@extends('layouts.user')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>


    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/doctor-info.css">
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
    <!-- Doctor Detail -->
    <div class="doctor-container">
        <div class="container">
            <div class="heading-section">
                <h2>Chi tiet Bac si</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <img src="./img/portrait/BS.PHẠM NGUYỄN VINH.png" alt="Doctor img">
                </div>
                <div class="col-md-9">
                    <div class="doctor-dtl">
                        <div class="doctor-info">
                            <div class="doctor-name"></div>
                        </div>
                        <div class="row">
                            <div class="dtl-container">
                                <div class="col-md-12 dtl-desc">
                                    <h1 class="lead">Dc.Nguyen Vinh</h1>
                                    <h2>Vị trí: Giám Đốc Bệnh Viện</h2>
                                    <h2>Địa điểm: Hà Nội</h2>
                                </div>
                                <div class="col-md-12">
                                    <button class="dropdown-button" type="button" data-toggle="collapse" data-target="#intro" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="dropdown-title text-truncate">Giới Thiệu</span>
                                        <span class="dropdown-arrow">
                                            ❕
                                        </span>
                                    </button>
                                    <div class="collapse" id="intro">
                                        <div class="card card-body" id="doctor-introduction">
                                            Giáo sư, Tiến sĩ, Bác sĩ Nguyen Vinh đã cống hiến hơn 30 năm trong lĩnh vực Gây mê - điều trị đau, là chuyên gia có thế mạnh về: Gây mê hồi sức trong phẫu thuật nhi
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="dropdown-button" type="button" data-toggle="collapse" data-target="#achievements" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="dropdown-title text-truncate">Thành tựu</span>
                                        <span class="dropdown-arrow">
                                            🎖
                                        </span>
                                    </button>
                                    <div class="collapse" id="achievements">
                                        <div class="card card-body" id="doctor-achievements">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="dropdown-button" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="dropdown-title text-truncate">Chuyên môn</span>
                                        <span class="dropdown-arrow">
                                            👨‍⚕️
                                        </span>
                                    </button>
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body" id="doctor-introduction">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="doctor-info-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đánh giá</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        Giáo sư, Tiến sĩ, Bác sĩ Nguyen Vinh đã cống hiến hơn 30 năm trong lĩnh vực Gây mê - điều trị đau, là chuyên gia có thế mạnh về: Gây mê hồi sức trong phẫu thuật nhi; Xử trí đường thở khó và đặt ống nội khí quản khó; Gây tê mặt phẳng cơ dựng sống dưới hướng dẫn siêu âm (ESP) cho phẫu thuật mở tim và ngực, kỹ thuật mới để điều trị đau không opioid; Giám sát thông khí cho bệnh nhân béo phì trong quá trình thực hiện phẫu thuật giảm cân; Chăm sóc giảm nhẹ cho người bệnh.

                        Bác sĩ Philippe Macaire nhận danh hiệu Giáo sư. Ông đã dành cả cuộc đời để học tập và nghiên cứu gây mê - giảm đau bằng việc tham gia các khóa học chuyên sâu tại Pháp, Dubai, Anh Quốc, Thái Lan và Việt Nam; là diễn giả tại hơn 150 hội thảo, hội nghị thế giới; và là tác giả của nhiều sách, bài viết về gây mê giảm đau. Ngoài ra, ông cũng là thành viên kỳ cựu, có đóng góp tích cực cho 16 tổ chức y tế như Tổ chức phi lợi nhuận về gây mê giảm đau vùng Francophone; Thành viên Hội đồng Gây tê vùng và Điều trị đau; Thành viên Hội đồng Khoa Học; Chủ tịch kiêm đồng Người sáng lập, Quỹ gây mê trong phẫu thuật chấn thương chỉnh hình: AFARCOT, Thành viên ban Tổ chức các cuộc họp hằng năm, Hiệp Hội Gây Mê Hồi Sức Pháp; Thành viên nhóm chuyên môn: Hướng dẫn thực hành giảm đau sau phẫu thuật; Thành viên Ban tổ chức Hội nghị năm 2000 tại Paris, Pháp; Thành viên nhóm chuyên môn: Hướng dẫn thực hành Gây tê vùng: Gây tê thần kinh ngoại vị; Hiệp hội Gây mê Mỹ ASA; Hiệp hội Gây mê Châu Âu ESRA; Hiệp hội ICAR Lyon; Cố vấn học tập cho tổ chức ESRA learning zone; Thành viên Hội thảo Gây mê hằng năm tại Dubai; Đồng sáng lập RA Asia Group về giảm đau gây tê vùng tại Châu Á và Nhóm điều trị giảm đau bệnh lý cơ xương dưới siêu âm (MSKUS-PM Group) trong điều trị đau can thiệp.

                        Hiện nay, Giáo sư, Tiến sĩ, Bác sĩ Philippe Macaire đang giữ vai trò Trưởng khoa Gây mê giảm đau - Khoa Gây mê giảm đau - Bệnh viện Đa khoa Quốc tế Vinmec Times City.
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
                </div>
            </div>
            <div style="text-align:center;font-size:14px;padding-bottom:20px;">Get free icon packs for your next project at <a href="http://iiicons.in/" target="_blank" style="color:#ff5e63;font-weight:bold;">www.iiicons.in</a></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    
</body>