var elem = $('.bs');
var count = elem.length;
var setColor = function() {
  elem.each(function(){
    var $this = $(this);
    var color = '#' + (function co(lor){   return (lor +=
    	[0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f'][Math.floor(Math.random() * 10 + 6)])
  		&& (lor.length == 6) ?  lor : co(lor); })('');
    $this.css({'background': color});
  });
};
var loop = function(){

  setTimeout(function(){
    elem.each(function(){
      var $this = $(this);
      var height = (Math.random() * 40) + 1;
      $this.css({
        'bottom': height,
        'height': height,
        'width': '3px'
      });
    });
    loop();
  }, 1100);

}
setColor();
loop();
