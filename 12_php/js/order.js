!

// go up 上がる
function go_up(){
  $('#transformBox').css({
          top: -100,
          left: 0
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
};

// go down 下がる
function go_down(){
  $('#transformBox').css({
          top: 100,
          left: 0
          }).on('transitionend', function () {
            $(this).css({
              top: 0,
              left: 0
          }).off('transitionend');
        });
};
