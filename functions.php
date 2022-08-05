<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );



add_shortcode( 'canvas_wave', 'canvas_wave_function' );

function canvas_wave_function($atts){

  return '<canvas id="'.$atts['id'].'"></canvas>
  <script>
  (function(){

  "use strict";


  function init() {

  var c = document.getElementById("'.$atts['id'].'"),
    ctx = c.getContext("2d"),
    cw = c.width = '.$atts['width'].',
    ch = c.height = '.$atts['height'].',
    points = [],
    tick = 0,
    opt = {
      count: 10,
      range: {
        x: 20,
        y: 80
      },
      duration: {
        min: 20,
        max: 40
      },
      thickness: 10,
      strokeColor: "#d50032",
      level: .35,
      curved: true
    },
    rand = function(min, max){
        return Math.floor( (Math.random() * (max - min + 1) ) + min);
    },
    ease = function (t, b, c, d) {
      if ((t/=d/2) < 1) return c/2*t*t + b;
      return -c/2 * ((--t)*(t-2) - 1) + b;
    };

ctx.lineJoin = "round";
ctx.lineWidth = opt.thickness;
ctx.strokeStyle = opt.strokeColor;

var Point = function(config){
  this.anchorX = config.x;
  this.anchorY = config.y;
  this.x = config.x;
  this.y = config.y;
  this.setTarget();  
};

Point.prototype.setTarget = function(){
  this.initialX = this.x;
  this.initialY = this.y;
  this.targetX = this.anchorX + rand(0, opt.range.x * 2) - opt.range.x;
  this.targetY = this.anchorY + rand(0, opt.range.y * 2) - opt.range.y;
  this.tick = 0;
  this.duration = rand(opt.duration.min, opt.duration.max);
}
  
Point.prototype.update = function(){
  var dx = this.targetX - this.x;
  var dy = this.targetY - this.y;
  var dist = Math.sqrt(dx * dx + dy * dy);
  
  if(Math.abs(dist) <= 0){
    this.setTarget();
  } else {       
    var t = this.tick;
    var b = this.initialY;
    var c = this.targetY - this.initialY;
    var d = this.duration;
    this.y = ease(t, b, c, d);
    
    b = this.initialX;
    c = this.targetX - this.initialX;
    d = this.duration;
    this.x = ease(t, b, c, d);
  
    this.tick++;
  }
};
    
Point.prototype.render = function(){
  ctx.beginPath();
  ctx.arc(this.x, this.y, 3, 0, Math.PI * 2, false);
  ctx.fillStyle = "#d50032";
  ctx.fill();
};

var updatePoints = function(){
  var i = points.length;
  while(i--){
    points[i].update();
  }
};

var renderPoints = function(){
  var i = points.length;
  while(i--){
    points[i].render();
  }
};

var renderShape = function(){
  ctx.beginPath();
  var pointCount = points.length;
  ctx.moveTo(points[0].x, points[0].y);   
  var i;
  for (i = 0; i < pointCount - 1; i++) {
    var c = (points[i].x + points[i + 1].x) / 2;
    var d = (points[i].y + points[i + 1].y) / 2;
    ctx.quadraticCurveTo(points[i].x, points[i].y, c, d);
  }
  ctx.lineTo(-opt.range.x - opt.thickness, ch + opt.thickness);
  ctx.lineTo(cw + opt.range.x + opt.thickness, ch + opt.thickness);
  ctx.closePath();   
  ctx.fillStyle = "#d50032";
  ctx.fill();  
  ctx.stroke();
};

var clear = function(){
  ctx.clearRect(0, 0, cw, ch);
};

var loop = function(){
  window.requestAnimFrame(loop, c);
  tick++;
  clear();
  updatePoints();
  renderShape();
  //renderPoints();
};

var i = opt.count + 2;
var spacing = (cw + (opt.range.x * 2)) / (opt.count-1);
while(i--){
  points.push(new Point({
    x: (spacing * (i - 1)) - opt.range.x,
    y: ch - (ch * opt.level)
  }));
}

window.requestAnimFrame=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||window.oRequestAnimationFrame||window.msRequestAnimationFrame||function(a){window.setTimeout(a,1E3/60)}}();

loop();

}

document.addEventListener("DOMContentLoaded",init,false);

})();
</script>

  ';



}