<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="./mediaFiles/tomDealsLogo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

    <title>TomDeals</title>
</head>

<body>
        <div class="all-body">
        <nav class="nav-bar">
        <div class="nav-container">
            <div class="nav-navLogo">
                <a href="./index.php">
                    <img src="./mediaFiles/tomDealsLogo.png" width="100%" height="100%" alt="logo">
                </a>
            </div>
            <div class="nav-navSearch">
                
                <form action="search_page.php" method="POST" class="search_form searchForm">
                    <input type="text" class="search-input search_field" name="search_data"
                        placeholder="Search items or categories" required>
                    <button type="submit" class="search-button sbtn" name="submit-btn-1"><i class="fas fa-search"></i></button>
                </form>
                
                <!-- <div class="container text-dark">
                        <div class="row rows">

                        </div>
                    </div> -->

            </div>
            <div class="top-nav-drop">
                <i class="fas fa-bars fa-bars-top" id="topDrop"></i>
            </div>
            <div class="nav-navLeft" id="NavNavLeft">
                <ul>
                    <li><a href="./index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="./Support.php"><i class="fas fa-users"></i> Feedback</a></li>
                    <li><a href="./SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn</a></li>
                    <li><a href="./SignUp.php"><i class="fas fa-sign-out-alt"></i> SignUp</a></li>
                </ul>
            </div>
        </div>
        
    </nav>
    <?php
        include('./components/homeslider.php');
        ?>
    <section class="flat-contact" >
                <div class="container">
                    <div class="row">
                    <div class="heading-section">
                                <h2 class="font-2 fw-8 ">We provide the most suitable and quality real estate.</h2>
                                <p class="text-color-4"></p>
                            </div>                      
                        <div class="col-lg-6 col-md-7">
                           
                            <div class="wrap-info">
                                <div class="bo">
                                <div class="box">
                                    <div class="box1">
                                        <div class="boxx">
                                <div class="box-info-flex-align-center">
                                    <div class="icon-info">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M42.5742 38.0897L42.7 38.0394V37.904V23.749C42.7 23.1695 43.1704 22.699 43.75 22.699C44.3295 22.699 44.8 23.1695 44.8 23.749V38.749C44.8 39.179 44.5378 39.5638 44.1424 39.7261C44.1421 39.7262 44.1419 39.7263 44.1417 39.7264L31.6657 44.7158L31.7375 44.8952C31.7375 44.8974 31.7375 44.8994 31.7375 44.9015L31.6563 44.7187L31.6371 44.7272C31.3894 44.8262 31.113 44.8262 30.8654 44.7272L30.8462 44.7187L30.8074 44.7015H30.801L18.8243 39.9108L18.75 39.8811L18.6757 39.9108L6.64074 44.7233L6.64072 44.7233C6.5143 44.7739 6.382 44.799 6.25 44.799C6.04199 44.799 5.83872 44.7382 5.66233 44.6185C5.37414 44.4229 5.2 44.0971 5.2 43.749V21.249C5.2 20.8188 5.46227 20.4344 5.85956 20.2746C5.85958 20.2746 5.8596 20.2746 5.85962 20.2746L18.3281 15.2857L18.3282 15.2863L18.3507 15.2788L18.3509 15.2791L18.3623 15.2745C18.6118 15.1739 18.8907 15.1739 19.1402 15.2745L19.1401 15.2746L19.1448 15.2763L19.1648 15.2838L19.1987 15.2965H19.1989L26.6456 18.2772C26.6456 18.2772 26.6456 18.2772 26.6457 18.2772C27.1862 18.4939 27.4479 19.1052 27.2319 19.6419L27.2318 19.6421C27.0154 20.182 26.3971 20.4421 25.8673 20.2285L25.8668 20.2283L20.0743 17.9108L19.8 17.8011V18.0965V37.9015V38.0369L19.9257 38.0872L29.9257 42.0872L30.2 42.1969V41.9015V28.749C30.2 28.1695 30.6704 27.699 31.25 27.699C31.8295 27.699 32.3 28.1695 32.3 28.749V41.904V42.1994L32.5742 42.0897L42.5742 38.0897ZM18.2775 15.134L18.265 15.1028L18.265 15.1028L18.265 15.0965L18.2775 15.134ZM17.5743 38.0872L17.7 38.0369V37.9015V18.094V17.7986L17.4257 17.9083L7.42572 21.9083L7.3 21.9586V22.094V41.9015V42.1969L7.57428 42.0872L17.5743 38.0872Z" fill="#8E8E93" stroke="white" stroke-width="0.4"/>
                                            <path d="M32.6999 13.749C32.6999 11.792 34.2928 10.199 36.2499 10.199C38.2069 10.199 39.7999 11.792 39.7999 13.749C39.7999 15.7061 38.2069 17.299 36.2499 17.299C34.2928 17.299 32.6999 15.7061 32.6999 13.749ZM34.7999 13.749C34.7999 14.5495 35.4494 15.199 36.2499 15.199C37.0503 15.199 37.6999 14.5495 37.6999 13.749C37.6999 12.9486 37.0503 12.299 36.2499 12.299C35.4494 12.299 34.7999 12.9486 34.7999 13.749Z" fill="#8E8E93" stroke="white" stroke-width="0.4"/>
                                            <path d="M36.0971 24.4704L36.25 24.6518L36.4029 24.4704C37.7722 22.8466 39.3407 20.7865 40.5681 18.831C41.1818 17.8533 41.7126 16.8981 42.0906 16.0341C42.4666 15.1746 42.7 14.3865 42.7 13.749C42.7 10.1936 39.8054 7.29902 36.25 7.29902C32.6945 7.29902 29.8 10.1936 29.8 13.749C29.8 14.3871 30.0334 15.1755 30.4094 16.0351C30.7874 16.8993 31.3182 17.8544 31.9319 18.8319C33.1593 20.7872 34.7278 22.8466 36.0971 24.4704ZM27.7 13.749C27.7 9.03448 31.5355 5.19902 36.25 5.19902C40.9645 5.19902 44.8 9.03448 44.8 13.749C44.8 14.8262 44.3769 16.1323 43.7105 17.5145C43.0462 18.8922 42.1501 20.3255 41.2259 21.6512C39.3782 24.3016 37.43 26.5055 37.0314 26.9501C36.8312 27.1712 36.5474 27.299 36.25 27.299C35.9526 27.299 35.6688 27.1712 35.4686 26.9501C35.0699 26.5053 33.1217 24.3015 31.2741 21.6512C30.3499 20.3255 29.4538 18.8922 28.7895 17.5145C28.1231 16.1323 27.7 14.8262 27.7 13.749Z" fill="#8E8E93" stroke="white" stroke-width="0.4"/>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h5 class="text-color-4">Office address</h5>
                                        <h4 class="fw-4 text-color-">2715 Ash Dr. San Jose, South Dakota 83475</h4>
                                    </div>
                                </div>
                                <div class="box-info-flex-align-center">
                                    <div class="icon-info">
                                        <svg width="50" height="51" viewBox="0 0 50 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.4648 13.7812C26.4648 14.5902 27.1207 15.2461 27.9297 15.2461C28.7387 15.2461 29.3945 14.5902 29.3945 13.7812C29.3945 12.9723 28.7387 12.3164 27.9297 12.3164C27.1207 12.3164 26.4648 12.9723 26.4648 13.7812Z" fill="#8E8E93"/>
                                            <path d="M32.3242 13.7812C32.3242 14.5902 32.9801 15.2461 33.7891 15.2461C34.598 15.2461 35.2539 14.5902 35.2539 13.7812C35.2539 12.9723 34.598 12.3164 33.7891 12.3164C32.9801 12.3164 32.3242 12.9723 32.3242 13.7812Z" fill="#8E8E93"/>
                                            <path d="M38.1836 13.7812C38.1836 14.5902 38.8395 15.2461 39.6484 15.2461C40.4574 15.2461 41.1133 14.5902 41.1133 13.7812C41.1133 12.9723 40.4574 12.3164 39.6484 12.3164C38.8395 12.3164 38.1836 12.9723 38.1836 13.7812Z" fill="#8E8E93"/>
                                            <path d="M22.6771 37.2188L27.0716 34.2891L35.8398 37.2188V43.0781C35.8398 44.6961 34.549 46.0078 32.931 46.0078C16.7508 46.0078 1.46484 30.8195 1.46484 14.6394C1.46484 13.0214 2.77656 11.7305 4.39453 11.7305H10.2539L13.1836 20.4987L10.2539 24.8933C12.1247 29.5703 18 35.3479 22.6771 37.2188Z" stroke="#8E8E93" stroke-width="1.7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M19.1406 13.7812C19.1406 18.6354 23.0756 22.5703 27.9297 22.5703V28.4297L33.7891 22.5703H39.6484C44.5025 22.5703 48.5352 18.6354 48.5352 13.7812C48.5352 8.92715 44.5025 4.99219 39.6484 4.99219H27.9297C23.0756 4.99219 19.1406 8.92715 19.1406 13.7812Z" stroke="#8E8E93" stroke-width="1.7" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h5 class="text-color-4">Request a call back</h5>
                                        <a href="tel:0123456789" ><h4 class="fw-8">+250-788-584-668</h4></a>
                                    </div>
                                </div>
                                <div class="box-info flex align-center">
                                    <div class="icon-info">
                                        <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1505_28697)">
                                            <path d="M36.6559 17.8341L36.6559 17.8341L36.6609 17.8392C36.8315 18.0113 37.0549 18.0969 37.2788 18.0969C37.5021 18.0969 37.7258 18.0116 37.8976 17.8411C38.2409 17.5005 38.241 16.9425 37.8996 16.5985C37.5586 16.2548 37.0037 16.2526 36.66 16.5934L36.6559 17.8341ZM36.6559 17.8341L36.6551 17.8332M36.6559 17.8341L36.6551 17.8332M36.6551 17.8332C36.3141 17.4895 36.3163 16.9345 36.66 16.5935L36.6551 17.8332Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M46.4639 27.8825H46.7054L46.5346 27.7118L39.3343 20.5115C38.992 20.1691 38.992 19.6141 39.3343 19.2718C39.6767 18.9296 40.2317 18.9296 40.574 19.2718L49.6441 28.3419C49.8085 28.5063 49.9009 28.7294 49.901 28.9618C49.901 29.1943 49.8086 29.4172 49.6442 29.5816L34.0757 45.1502C33.9114 45.3145 33.6884 45.4069 33.4559 45.4069C33.2235 45.4069 33.0005 45.3145 32.8361 45.1502L9.34306 21.6572C9.34306 21.6572 9.34305 21.6572 9.34305 21.6572C9.00075 21.3148 9.00076 20.7598 9.34305 20.4175L24.9114 4.84884C25.2537 4.50664 25.8087 4.50664 26.151 4.84884C26.151 4.84884 26.151 4.84884 26.1511 4.84884L34.9723 13.67C35.3146 14.0124 35.3146 14.5675 34.9723 14.9098C34.6299 15.252 34.0749 15.2519 33.7326 14.9098L26.7811 7.95839L26.6104 7.78768V8.0291V25.1994C26.6104 26.679 27.8139 27.8825 29.2935 27.8825H46.4639ZM24.8575 7.62373V7.38231L24.6868 7.55302L12.2497 19.9901L12.079 20.1608H12.3204H24.7575H24.8575V20.0608V7.62373ZM32.4087 42.2434L32.5794 42.4141V42.1727V29.7356V29.6356H32.4794H29.2937C26.8477 29.6356 24.8575 27.6455 24.8575 25.1994V22.0139V21.9139H24.7575H12.3204H12.079L12.2497 22.0846L32.4087 42.2434ZM34.3324 42.1728V42.4142L34.5031 42.2435L46.9401 29.8064L47.1108 29.6356H46.8694H34.4324H34.3324V29.7356V42.1728Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M0.976562 24.9047H6.70225C7.18637 24.9047 7.57881 25.2972 7.57881 25.7812C7.57881 26.2654 7.18637 26.6578 6.70225 26.6578H0.976562C0.492442 26.6578 0.1 26.2653 0.1 25.7812C0.1 25.2972 0.492442 24.9047 0.976562 24.9047Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M9.59961 24.9047H9.61426C10.0984 24.9047 10.4908 25.2972 10.4908 25.7812C10.4908 26.2653 10.0984 26.6578 9.61426 26.6578H9.59961C9.11549 26.6578 8.72305 26.2653 8.72305 25.7812C8.72305 25.2972 9.11549 24.9047 9.59961 24.9047Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M0.978516 14.6508H4.10381C4.58793 14.6508 4.98037 15.0433 4.98037 15.5273C4.98037 16.0114 4.58793 16.4039 4.10381 16.4039H0.978516C0.494395 16.4039 0.101953 16.0114 0.101953 15.5273C0.101953 15.0433 0.494395 14.6508 0.978516 14.6508Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M7.29315 14.6508H10.9873C11.4714 14.6508 11.8639 15.0433 11.8639 15.5273C11.8639 16.0114 11.4714 16.4039 10.9873 16.4039H7.29315C6.80903 16.4039 6.41659 16.0114 6.41659 15.5273C6.41659 15.0433 6.80903 14.6508 7.29315 14.6508Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M7.64453 30.2758H13.1132C13.5972 30.2758 13.9897 30.6683 13.9897 31.1523C13.9897 31.6364 13.5973 32.0289 13.1132 32.0289H7.64453C7.16041 32.0289 6.76797 31.6364 6.76797 31.1523C6.76797 30.6683 7.16041 30.2758 7.64453 30.2758Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            <path d="M3.61328 36.5258H17.3827C17.8668 36.5258 18.2593 36.9183 18.2593 37.4023C18.2593 37.8864 17.8668 38.2789 17.3827 38.2789H3.61328C3.12916 38.2789 2.73672 37.8864 2.73672 37.4023C2.73672 36.9183 3.12916 36.5258 3.61328 36.5258Z" fill="#8E8E93" stroke="white" stroke-width="0.2"/>
                                            </g>
                                            <defs> 
                                            <clipPath id="clip0_1505_28697">
                                            <rect width="50" height="50" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h5 class="text-color-4">Email us</h5>
                                        <a href="info:habanabakizethomas1@gmail.com"><h4 class="fw-8">habanabakizethomas1@gmail.com</h4></a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="imagesb">
                                <img class="img1" src="style/tom.png" alt="images">
                            </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <!-- <div class="mark-img">
                    <img src="assets/images/mark/mark-vector.png" alt="images">
                </div> -->
            </section>
    <div class="container-sec">
        <div class="cont">
    <section class="flat-agents">
    <div class="container-fluid">
            <!-- Left side description -->
             <div class="bdiv">
            <div class=" col-md-7">
                <div class="heading-section">
                    <h2>Become Our Agents</h2>
                    <p class="text-1">Become an agent and get the commission you deserve</p>
                    <div class="icon-img">
                        <img src="./mediaFiles/tomDealsLogo.png" alt="icon">
                    </div>
                    <h4 class="text-2">
                        With a history of 3 years,we have built strong relationships with more than 5 tomdeals partners, providing profitable opportunities for investors from more than 6 countries.
                    </h4>
                    <div class="title-content">
                        <h4 class="fs-16">Thomas Habanabakize</h4>
                        <p>CEO and founder at tomdeals</p>
                    </div>
                    <div class="button-box flex justify-start">
                        <div class="button-one">
                            <a class="sc-button" href="signUp.php">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.75 15L15.75 12M15.75 12L12.75 9M15.75 12H8.25M21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 9.61305 3.94821 7.32387 5.63604 5.63604C7.32387 3.94821 9.61305 3 12 3C14.3869 3 16.6761 3.94821 18.364 5.63604C20.0518 7.32387 21 9.61305 21 12Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Join Us</span>
                            </a>
                        </div>
                        <div class="button-two">
                            <a class="sc-button" href="https://wa.me/250785068810?text=Hello.%0aThis%20is%20TomDeals.%0aHow%20Can%20we%20help%20you?">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.25 6.75C2.25 15.034 8.966 21.75 17.25 21.75H19.5C20.0967 21.75 20.669 21.5129 21.091 21.091C21.5129 20.669 21.75 20.0967 21.75 19.5V18.128C21.75 17.612 21.399 17.162 20.898 17.037L16.475 15.931C16.035 15.821 15.573 15.986 15.302 16.348L14.332 17.641C14.05 18.017 13.563 18.183 13.122 18.021C11.4849 17.4191 9.99815 16.4686 8.76478 15.2352C7.53141 14.0018 6.58087 12.5151 5.979 10.878C5.817 10.437 5.983 9.95 6.359 9.668L7.652 8.698C8.015 8.427 8.179 7.964 8.069 7.525L6.963 3.102C6.90214 2.85869 6.76172 2.6427 6.56405 2.48834C6.36638 2.33397 6.1228 2.25008 5.872 2.25H4.5C3.90326 2.25 3.33097 2.48705 2.90901 2.90901C2.48705 3.33097 2.25 3.90326 2.25 4.5V6.75Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span>Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="col-lg-6">
                <div class="video-box">
                        <div class="imagi">
                        <div class="im">
                            <iframe width="400" height="500" src="https://www.youtube.com/embed/V0ca53JAopE?si=ahh9s1xgDpfeYrzn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen  class="youtube-v"></iframe>
                        </div>
                        </div>
                           
                </div>
            </div>
            </div>
            </div>
            <!-- Right side video -->
            </div>
        </div>
    </div>
</section>
</div>
</div>
<div class="container-dive">
    
                           <div class="wrap-img-flex">
                                <div class="box-img-box-1">
                                    <div class="img-box-2">
                                    <a href="style/Video .mp4" class="lightbox-image">
                            <svg width="15" height="18" class="video-icon2" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3919 7.31221C14.6269 8.09812 14.6269 9.90095 13.3919 10.6869L3.3346 17.087C2.00315 17.9343 0.260849 16.9778 0.260849 15.3997L0.26085 2.5994C0.26085 1.02122 2.00315 0.0647914 3.3346 0.912078L13.3919 7.31221Z" fill="#8da242"/>
                            </svg>
                            <i class="ripple"></i>
                        </a>    
                                       <img class="img-1" src="style/box1.jpg" alt="images">
                                       </div>
                                </div>
                                </div>
<div class="feedback-support">
        <div class="support-heading">
            <h3>FEEDBACK </h3>
            <h4>We will respond as soon <br>
            as we receive your message</h4>
        </div>
        <div class="support-inputs">
            <form class="support_form" action="#" method="post">
            <div>
            <input type="text" placeholder="Enter your  name" name="client_name" required >
            </div>
              <div>
                 <input type="hidden" value="<?php echo $admin_email;?>" name="admin_email">
                 <input type="text" placeholder="Enter Email your  or Phone" name="client_email" required >
              </div>
            <div>
           <textarea name="messages" id="" cols="30" rows="10" placeholder="Write your feedback or message"
           class="send_text" required style="width:7cm;"></textarea>
            </div>
           <div class="alert  alert_message  alert-dismissible " role="alert" id="alert_m">
            </div>
            <div>
              <button type="submit" class="sendbtn">SEND</button>
            </div>
             </form>
        </div>
    </div>
                        </div>
<section class="flat" >
                <div class="container12">
                    <div class="row">                      
                        <div class="col-lg-12">
                            <div class="heading-section center">
                                <h2>SERVICES THAT WE OFFER</h2>
                                <p class="text-1 text-color-4">welcome to tomdeals websit we provide the best</p>
                            </div>
                        </div>
                        <div class="container123">
                        <div class="col-md-4">
                            <div class="box12">
                                <div class="icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M32.8125 10.9375C34.4701 10.9375 36.0598 11.596 37.2319 12.7681C38.404 13.9402 39.0625 15.5299 39.0625 17.1875M45.3125 17.1875C45.3128 19.0106 44.9142 20.8118 44.1448 22.4646C43.3754 24.1175 42.2537 25.582 40.8585 26.7555C39.4632 27.9291 37.8282 28.7832 36.0679 29.258C34.3077 29.7328 32.4649 29.8168 30.6687 29.5041C29.4958 29.3021 28.2542 29.5583 27.4125 30.4L21.875 35.9375H17.1875V40.625H12.5V45.3125H4.6875V39.4416C4.6875 38.1979 5.18125 37.0041 6.06042 36.1271L19.6 22.5875C20.4417 21.7458 20.6979 20.5041 20.4958 19.3312C20.2004 17.6253 20.2626 15.8766 20.6784 14.196C21.0942 12.5154 21.8546 10.9395 22.9114 9.56815C23.9682 8.19681 25.2983 7.05996 26.8175 6.22963C28.3367 5.39931 30.0118 4.89362 31.7367 4.74462C33.4616 4.59562 35.1986 4.80656 36.8377 5.36406C38.4768 5.92156 39.9822 6.81347 41.2585 7.98327C42.5348 9.15307 43.5542 10.5752 44.252 12.1597C44.9499 13.7441 45.311 15.4562 45.3125 17.1875Z" stroke="#8da242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h3 class="Property-head">Property Management</h3>
                                <p class="text-color-2">TomDeals.rw ni urubuga rw'ubuyobozi bw'imitungo n'ubucuruzi bw'ibibanza rufasha mu kugura, kugurisha, no gukodesha ibibanza mu Rwanda. Urubuga rutanga urutonde rw'inyubako, amahoteri, n'amasambu mu bice bitandukanye, by'umwihariko i Kigali. Abakoresha bashobora gusura ibibanza bihari, kugereranya ibiciro, no gukora amasezerano byikora ku rubuga. TomDeals inatanga ibicuruzwa by'imodoka n'amasezerano y'amasambu, bigatuma ruba urubuga rw'ingenzi ku bucuruzi bw'imitungo n'ibinyabiziga. Urubuga rufite uburyo bworoshye bwo gukoresha kandi rufasha ababishaka, abaguzi, abashoramari, n'abakodesha gushyiraho konti no kuyobora ibibanza byabo.</p>
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class="box12">
                                <div class="icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.1875 43.75V33.5937C17.1875 32.3 18.2375 31.25 19.5312 31.25H24.2187C25.5125 31.25 26.5625 32.3 26.5625 33.5937V43.75M26.5625 43.75H35.9375V7.38542M26.5625 43.75H42.1875V22.3958M35.9375 7.38542L39.0625 6.25M35.9375 7.38542L14.0625 15.3417M42.1875 22.3958L35.9375 20.3125M42.1875 22.3958L45.3125 23.4375M4.6875 43.75H7.8125M7.8125 43.75H45.3125M7.8125 43.75V6.25H14.0625V15.3417M4.6875 18.75L14.0625 15.3417" stroke="#8da242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h3 class="Property-head">Consulting Service</h3>
                                <p class="text-color-2">TomDeals itanga serivisi z'ubujyanama mu rwego rw'ubucuruzi bw'imitungo, zigamije gufasha abakiriya gucunga ibibazo by'imikoreshereze y'ibibanza. Ubu bujyanama burimo gufasha mu kugura, kugurisha, no gukodesha ibibanza, ndetse no gutanga inama ku byerekeye imigendekere y'isoko n'uburyo bwo gushora imari. Urubuga rutanga uburambe bworoshye bwo gukoresha, bufasha abakiriya kubona serivisi bakenera byoroshye no kwakira inama z'inararibonye ziteguye ku byifuzo byabo. Kuri byinshi, ushobora gusura serivisi zabo ku rubuga rwabo rwa interineti: TomDeals. </p>
                            </div>
                        </div>
                        <div class=" col-md-4">
                            <div class="box12">
                                <div class="icon">
                                    <svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M25.001 37.4999V26.5624M25.001 26.5624C26.0551 26.5633 27.1051 26.431 28.126 26.1687M25.001 26.5624C23.947 26.5633 22.897 26.431 21.876 26.1687M29.6885 41.7479C26.5912 42.336 23.4109 42.336 20.3135 41.7479M28.126 46.7124C26.0484 46.93 23.9537 46.93 21.876 46.7124M29.6885 37.4999V37.0999C29.6885 35.052 31.0594 33.302 32.8302 32.2749C35.8052 30.5521 38.129 27.8962 39.4415 24.7188C40.754 21.5413 40.9819 18.0197 40.0899 14.6996C39.198 11.3795 37.236 8.44622 34.5078 6.35428C31.7797 4.26235 28.4379 3.12854 25 3.12854C21.5622 3.12854 18.2203 4.26235 15.4922 6.35428C12.7641 8.44622 10.802 11.3795 9.91006 14.6996C9.01811 18.0197 9.24604 21.5413 10.5585 24.7188C11.871 27.8962 14.1948 30.5521 17.1698 32.2749C18.9406 33.302 20.3135 35.052 20.3135 37.0999V37.4999" stroke="#8da242" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h3 class="Property-head">Buy and sell real estate</h3>
                                <p class="text-color-2">omDeals ifasha mu kugura no kugurisha ibibanza mu Rwanda, igamije gutanga urubuga rwuzuye ku bafite ibibanza n'abakiriya bashya. Serivisi zabo zirimo:

Urutonde rw'Ibibanza: Abakoresha bashobora gusura urutonde rw'ibibanza bitandukanye, birimo ibyumba byo guturamo n'ibicuruza.

Amasezerano Yihariye: Urubuga rwemerera abakoresha guhura byihuse n'abagurisha cyangwa abakozi b'ubucuruzi, bigatuma gahunda n'ubucuruzi bigenda neza. Iyi mfashanyigisho igamije gutuma kugura no kugurisha biba byoroshye.

Isoko: TomDeals itanga amakuru ku ngamba z'ishoramari n'ibigezweho ku isoko, ifasha abakiriya kumenya ibijyanye n'ibiciro n'imigendekere y'ibibanza.</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    <!-- Footer -->
    <?php include('./components/footer.php'); ?>

</body>

</html>
