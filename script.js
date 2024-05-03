// const sliderContent = document.querySelector('.slider-content');
// let scrollValue = 0;

// function scrollImages(e) {
//     if (e.deltaY > 0) {
//         scrollValue += 100;
//     } else {
//         scrollValue -= 100;
//     }

//     scrollValue = Math.min(Math.max(scrollValue, 0), sliderContent.scrollWidth - sliderContent.clientWidth);

//     sliderContent.style.transform = `translateX(-${scrollValue}px)`;
//     e.preventDefault();
// }

// window.addEventListener('wheel', scrollImages);

const scrollContainer = document.querySelector(".slider");

scrollContainer.addEventListener("wheel", (evt) => {
  evt.preventDefault();
  scrollContainer.scrollLeft += evt.deltaY;
});

var copy = document.querySelector(".logo3_list").cloneNode(true);
document.querySelector(".logo3_component").appendChild(copy);
