//Cutting Contents Text
const conTxt = document.querySelectorAll('.con-txt p a');
conTxt.forEach(element => {
  //console.log(element.textContent.slice(0,10) + "...");
  const cutTxt = element.textContent.slice(0, 50) + "...";
  element.textContent = cutTxt;
});

//Mobile Menu Activate
const mobileMenu = document.querySelector('.mobile-menu');

mobileMenu.onclick = () => {
  mobileMenu.classList.toggle('active');
}

$(document).ready(function () {
  //Lightslider Plugin Code
  $(".intro").lightSlider({
    item:1,
    pager:false,
    //슬라이드 밑에 .... 으로 된 선택자를 없애주는 옵션
    loop:true,
    slideMargin:0,
    speed: 400, //ms'
    auto: true,
    pause: 3500,
    mode:'fade',
    adaptiveHeight:true,
  });
});

//Pie Chart Rendering Code
$(function () {
  $(window).ajaxComplete(function () {
  let lWidth = 10;
  let tWidth = 8;
  let pieSize = 200;
  let clearSet;
  const winWidth = $(window).width();

  if (winWidth <= 1280 && winWidth > 950) {
    pieSize = 150;
  } else if (winWidth <= 950 && winWidth >= 400) {
    pieSize = 170;
  } else if (winWidth <= 400) {
    pieSize = 140;
  } else {
    pieSize = 200;
  }

  // var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
  $('.total-chart .chart').easyPieChart({
    easing: 'easeOutElastic',
    delay: 3000,
    barColor: '#f28888',
    trackColor: '#edc0c0',
    scaleColor: false,
    lineWidth: lWidth,
    trackWidth: tWidth,
    lineCap: 'butt',
    size: pieSize,
    onStep: function (from, to, percent) {
      this.el.children[0].innerHTML = Math.round(percent);
    }
  });
      
  // window.addEventListener('resize', function () {
  $(window).resize(function(){
    const winWidth = $(window).width();

    if (winWidth <= 1280 && winWidth > 950) {
      pieSize = 150;
    } else if (winWidth <= 950 && winWidth >= 400) {
      pieSize = 170;
    } else if (winWidth <= 400) {
      pieSize = 140;
    } else {
      pieSize = 200;
    }
        
    clearTimeout(clearSet);
    clearSet = setTimeout(function () {
      $('.total-chart .chart').removeData('easyPieChart').find('canvas').remove();
      // var chart = window.chart = new EasyPieChart(document.querySelector('.total-chart .chart'), {
      $('.total-chart .chart').easyPieChart({
        easing: 'easeOutElastic',
        delay: 3000,
        barColor: '#f28888',
        trackColor: '#edc0c0',
        scaleColor: false,
        lineWidth: lWidth,
        trackWidth: tWidth,
        lineCap: 'round',
        size: pieSize,
        onStep: function (from, to, percent) {
          this.el.children[0].innerHTML = Math.round(percent);
        }
    
      }, 150);
    });
});
        
  //---each chart
  if (winWidth <= 950) {
    lWidth = 5;
    tWidth = 5;
  } else {
    lWidth = 8;
    tWidth = 8;
  }

  if (winWidth <= 1280) {
    eachSize = 90;
  } else {
    eachSize = 110;
  }
  
  // $(window).ajaxComplete(function () {
    const poData = [
      { poKind: '.db_pofol', bColor: '#7c41f5', tColor: '#c1a5fa' },
      { poKind: '.api_pofol', bColor: '#ff9062', tColor: '#fcc5ae' },
      { poKind: '.renewal_pofol', bColor: '#3acbe8', tColor: '#a2dce8' },
      { poKind: '.planning_pofol', bColor: '#69c', tColor: '#ace' },
      //{ poKind: '.total-chart', bColor: '#f28888', tColor: '#edc0c0' }
    ];

    function startPie() {
      poData.map(value => {

        //var chart = window.chart = new EasyPieChart(document.querySelector(value.poKind + ' .chart'), {
        $(value.poKind + ' .chart').easyPieChart({
          easing: 'easeOutElastic',
          delay: 3000,
          barColor: value.bColor,
          trackColor: value.tColor,
          scaleColor: false,
          lineWidth: lWidth,
          trackWidth: tWidth,
          lineCap: 'round',
          size: 110,
          onStep: function (from, to, percent) {
            this.el.children[0].innerHTML = Math.round(percent);
          }
        });
      });
    }

    startPie();
  });
});
//Open Modal for Input Rates
//1. 버튼 DOM 저장 = > index.php 133번줄
const modalBtn = document.querySelector('#open-modal');
//5.modal변수에 모달박스 DOM 저장
const modal = document.querySelector('#myModal');

//6. X 버튼 DOM 저장
const times = document.querySelector('#times');

//4. modalBtn을 클릭했을 때 모달 박스 보이기
modalBtn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
//7. X버튼 클릭 시 모달창 제거
// times.onclick = function() {
//   modal.style.display = "none";
// }

// When the user clicks anywhere outside of the modal, close it
//8. 모달 이외 영역 클릭 시 모달창 제거
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}