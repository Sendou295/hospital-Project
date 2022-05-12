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
    <link rel="stylesheet" href="./css/specialities.css">
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
        <h1>CÁC KHOA TRONG BỆNH VIỆN</h1>
    </div>
    <!-- Specialities -->
    <div class="specialities-list">
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://tamanhhospital.vn/wp-content/uploads/2017/03/lich-kham-thai-dinh-ky-cho-me-bau-2.jpg)">
                <h1 class="text-shadow">Khám Thai</hi>
            </div>
            <div class="back">
                <h2>Khám Thai</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
        <div class="specialities-item">
            <div class="front" style="background-image: url(https://cdn.bookingcare.vn/fr/w800/2018/09/05/145607phu-san-thanh-nhan2.jpg)">
                <h1 class="text-shadow">Chữa Bệnh sản phụ Khoa</hi>
            </div>
            <div class="back">
                <h2>Chữa Bệnh sản phụ Khoa</h2>
                <p>HotLine: 80808080</p>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="wrapper">
        <ul id="pagination">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>