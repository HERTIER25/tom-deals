<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Slideshow</title>
<style>
  .slideshow-container {
    align-self: center;
    overflow: hidden;
    width: 80%;
    /* height: 50%; */
    height: 40vh;
    /* max-width: 800px; */
    position: relative;
    /* margin: auto; */
  }

  .mySlides {
    display: none;
  }

  .mySlides img {
    width: 100%;
    height: 100%;
    /* height: auto; */
    object-fit: cover;
  }
  a{
    text-decoration: none;
    color: white;
    font-size: 16px;
  }
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 20px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
  }

  .next {
    right: 0;
    border-radius: 3px 0 0 3px;
  }

  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
  }

  .caption {
    text-align: center;
    color: #ffffff;
    background-color: rgba(0, 0, 0, 0.5);
    width: 100%;
    padding: 10px;
    position: absolute;
    bottom: 0;
    left: 0;
  }

  @media (max-width: 600px) {
    .slideshow-container {
      width: 100%;
    }
    
  }
</style>
</head>
<body>

<div class="slideshow-container">
  <div class="mySlides fade">
    <img src="./mediaFiles/image1.jpg" alt="Slide 1">
    <div class="caption">        <a href="https://wa.me/250785068810?text=Hello.%0aThis%20is%20TomDeals.%0aHow%20Can%20we%20help%20you?" target="_blank"><i class="fa-brands fa-whatsapp"></i> Twandikire</a>
</div>
  </div>

  <div class="mySlides fade">
    <img src="./mediaFiles/image2.jpg" alt="Slide 2">
    <div class="caption">        <a href="https://wa.me/250785068810?text=Hello.%0aThis%20is%20TomDeals.%0aHow%20Can%20we%20help%20you?" target="_blank"><i class="fa-brands fa-whatsapp"></i> Twandikire</a>
</div>
  </div>

  <div class="mySlides fade">
    <img src="./mediaFiles/image3.jpg" alt="Slide 3">
    <div class="caption">        <a href="https://wa.me/250785068810?text=Hello.%0aThis%20is%20TomDeals.%0aHow%20Can%20we%20help%20you?" target="_blank"><i class="fa-brands fa-whatsapp"></i> Twandikire</a>
</div>
  </div>

  <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
</div>

<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 9000); // Change image every 4 seconds
  }

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
</script>

</body>
</html>
