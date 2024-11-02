$(".menu-btn").click(function() {
    $(".navbar .menu").toggleClass("active");
    $(".menu-btn i").toggleClass("active");
});

$(".enter").click(function(){
    alert("Buscar...")
})


const imgs = [
    '../carruselTop/img1.png',
    '../carruselTop/img2.png'
];
let imgPos = 0;

$("#arrow-banner-left").click(previousImg);
$("#arrow-banner-right").click(nextImg);

function nextImg() {
    if(imgPos >= imgs.length-1) {
        imgPos = 0;
    }else{
        imgPos++;
    }
    $("#carrusel-inner").css('background-image','url(' + imgs[imgPos] + ')');
}

function previousImg() {
    if(imgPos < imgs.length-1) {
        imgPos = imgs.length-1;
    }else{
        imgPos--;
    }
    $("#carrusel-inner").css('background-image','url(' + imgs[imgPos] + ')');
}

var offers = new Splide( '.offers', {
    perPage: 5,
    rewind : true,
    speed: 1000,
    padding: '1%',
    gap: '100px',
    arrow: {prev: '.splide__arrow--prev', next: '.splide__arrow--next'},
  } );

  var sellers = new Splide( '.sellers', {
    perPage: 5,
    rewind : true,
    speed: 1000,
    padding: '1%',
    gap: '100px',
    arrow: {prev: '.splide__arrow--prev', next: '.splide__arrow--next'},
  } );

  offers.mount();
  sellers.mount();

$("#account").click(accountClick);

function accountClick() {
    fetch('../../logica/accountCheck.php')
    .then(response => response.text())
    .then(data => {
        console.log(data);
        if(data == true) {
            location.href="../pages/panel.php";
        }else if(data == false){
            location.href="../pages/login.html";
        }


    })
    .catch(error => console.error('Error:', error));
}


$(".btn").click(function() {
    let id = $(this).attr('name');
    console.log(id);
});