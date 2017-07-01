

// 1 go up 上がる
function go_up(){
  setInterval(function(){
  $('#transformBox').css({
          top: -100,
          left: 0
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
  },1000);
};

// 2 go down 下がる
function go_down(){
  setInterval(function(){
  $('#transformBox').css({
          top: 100,
          left: 0
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
  },1000);
};


// 3 Go to the left 左へ歩く
function Go_to_the_left(){
  setInterval(function(){
  $('#transformBox').css({
          top: 0,
          left: -200
          // right: -200
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
  },1000);
};

// 4 Go to the right 右へ歩く
function Go_to_the_right(){
  setInterval(function(){
  $('#transformBox').css({
          top: 0,
          left: 200
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
  },1000);
};

// 5 growing 大きくなる　
function growing(){
    setInterval(function(){
    $('#transformBox').css({
      transform: 'translate3d(50%,50%,0) scale(3)'  // 3倍に拡大
    }).on('transitionend', function () {
        $(this).css({
          transform: 'translate3d(50%,50%,0)'
        }).off('transitionend');
    });
    },1000);
};

// 6 small 小さくなる　
function small(){
setInterval(function(){
    $('#transformBox').css({
      transform: 'translate3d(50%,50%,0) scale(0.5)'  // 縮小
    }).on('transitionend', function () {
        $(this).css({
          transform: 'translate3d(50%,50%,0)'
        }).off('transitionend');
    });
    },1000);
};


// 7 Rotate to the right 右に回転する
function Rotate_to_the_right(){
  setInterval(function(){
  $('#transformBox').css({
    transform: 'translate3d(50%,50%,0) rotateX(360deg)' // X軸を中心に1回転
    // transform: 'rotateY(360deg)' // Y軸を中心に1回転
    // transform: 'rotateZ(360deg)' // Z軸を中心に1回転
  }).on('transitionend', function () {
      $(this).css({
      transform: 'translate3d(50%,50%,0)'
      }).off('transitionend');
  });
  },1000);
};



// -webkit-transform: scale(0.5);
// -moz-transform: scale(0.5);
// -ms-transform: scale(0.5);
// -o-transform: scale(0.5);


// Rotate to the right　右に回転する
// function Rotate_to_the_right(){
//   $('#transformBox').css({
//     transform: 'rotateX(360deg)' // X軸を中心に1回転
//     // transform: 'rotateY(360deg)' // Y軸を中心に1回転
//     // transform: 'rotateZ(360deg)' // Z軸を中心に1回転
//   }).on('transitionend', function () {
//       $(this).css({
//         // transform: ''
//         top: 0,
//         left: 0
//       }).off('transitionend');
//   });
// };





















// end
