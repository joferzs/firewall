angular.module('plunker', ['ui.bootstrap']);
function CarouselDemoCtrl($scope) {
  $scope.myInterval = 4000;
  var slides = $scope.slides = [];
  $scope.addSlide = function() {
    var newWidth = 'hitla';
    slides.push({
      image: '../../bundles/dscorpadmin/imagenes/' + newWidth + '.jpg',
      text: ['More','Extra','Lots of','Surplus'][slides.length % 4] + ' ' + ['Cats', 'Kittys', 'Felines', 'Cutes'][slides.length % 4]
    });
  };
  for (var i=0; i<4; i++) {
    $scope.addSlide();
  }
}