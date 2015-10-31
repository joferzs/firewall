angular.module('app',['ngAnimate'])

.controller('appCtrl',function($scope){
	$scope.ImgVisible = false;
	$scope.submitForm = function (formData) {
    	alert('Form submitted with' + JSON.stringify(formData));
  	};
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