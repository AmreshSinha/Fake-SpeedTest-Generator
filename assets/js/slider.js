const burger = document.querySelector('.icon');
const dropdown = document.querySelector('.dropdown');
let collapsed = true;

burger.addEventListener("click", () => {
  if(collapsed){
    dropdown.style.maxHeight = dropdown.scrollHeight + "px";
    collapsed = false;
  }
  else{
    dropdown.style.maxHeight = "";
    collapsed = true;
  }
  if(burger.innerHTML == 'menu') burger.innerHTML = 'close';
  else burger.innerHTML = 'menu';
})

window.addEventListener("resize", () => {
  if(!collapsed){
    dropdown.style.maxHeight = "";
    collapsed = true;
  }
  burger.innerHTML = 'menu';
})