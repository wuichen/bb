var app = angular.module('bb', ['ngRoute', 'infinite-scroll']);

app.service('dataFactory', ['$http', '$q',
  function($http, $q) {
     /**
     *  Gets the specific group with release notes
     */
    this.getFiles = function() {
      var url = 'getData.php';
      var deferred = $q.defer();

      $http.get(url)
        .success(function(data) {
          deferred.resolve(data);
        })
        .error(function(data, status) {
          console.log('error getting data from server: ' + status);
          deferred.reject(data);
        });
      return deferred.promise;
    };

  }
]);

app.controller('bbController', ['$scope', 'dataFactory', function($scope,dataFactory) {
  $scope.list = [];
  // $scope.text = 'hello';

  // $scope.submit = function() {
  //   if ($scope.text) {
  //     $scope.list.push(this.text);
  //     $scope.text = '';
  //   }
  // };

  $scope.loadMore = function(){
    for (var i = 0; i <= 3; i++) {
      if($scope.files.length != 0){
        $scope.list.push($scope.files.pop());
      }
    };    
  }

  dataFactory.getFiles().then(function(dataResponse) {
    $scope.files = dataResponse;
  });

}]);

