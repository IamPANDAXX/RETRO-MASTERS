//funciones generales
const slider = document.querySelector('.slider');

let autoSliderInterval;

function activate(e) {
  const items = document.querySelectorAll('.item');
  
  if (e.target.matches('.next')){
    slider.append(items[0]);
  }
  if (e.target.matches('.prev')){
    slider.prepend(items[items.length-1]);
    
  }
}

//Para detenerlo cuando este en el contenedor
function stopSlide(){
    clearInterval(autoSliderInterval);
}

function contentHoverStop(){
    const slider = document.querySelectorAll('.slider');
    
    slider.forEach(slider => {
        slider.addEventListener('mouseenter', stopSlide);
        slider.addEventListener('mouseleave', startAutoSlide);
    })
}
//Avance automatico
function autoSlide(){
    const items = document.querySelectorAll('.item');
    slider.append(items[0]);

}
function startAutoSlide(){
    autoSliderInterval = setInterval(autoSlide, 7000);
}

//Reinicio del carrusel
function resetAutoSlide (){
    clearInterval(autoSliderInterval);
    startAutoSlide();
}

document.addEventListener('click', function (e){
    if (e.target.matches('.next') || e.target.matches('.prev')){
        activate(e);
        resetAutoSlide();
    }
}, false);


//Carga de video fondo
document.querySelectorAll('.item').forEach(item => {
    const video = item.querySelector('.video-portada');
    const videoUrl = item.getAttribute('data-video');

    //Cargamos el src del video al data-video
    if (video && videoUrl) {
        video.src = videoUrl;
        console.log('cargando video...', videoUrl);
    }
    item.addEventListener('pointerenter', () => {
        if (video)
            video.play();
    });
    item.addEventListener('pointerleave', () => {
        if (video) {
            video.pause();
            video.currentTime = 0;
        }
    }); 
});

//document.querySelectorAll('.content').forEach(content => {
    //content.addEventListener('mouseenter', () => {
        //stopSlide();
    //});
    
    //content.addEventListener('mouseleave', () => {
        //startAutoSlide();
    //});
//});
startAutoSlide();
contentHoverStop();