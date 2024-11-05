
$(".menu-btn").click(function() {
    $(".navbar .menu").toggleClass("active");
    $(".menu-btn i").toggleClass("active");
});

$(".enter").click(function(){
    let busqueda = $(".bar").val();
    location.href="../pages/busqueda.php?busqueda="+busqueda;
})