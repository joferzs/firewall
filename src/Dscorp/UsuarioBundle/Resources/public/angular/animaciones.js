angular.module('appAnim',['ngAnimate'])

.controller('animacionCtrl',function($scope){
	$scope.ImgVisible = false;
})
.animation('.animacion',function(){
	return {
		leave: function(element,done){
			element.addClass('deslizar');
			done();
		},
		enter: function(element,done){
			element.addClass('deslizar');
			done();
		}
	}
});