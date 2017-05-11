App.directive('modalDialog', ['$http', function($http) {
    return {
        restrict: 'E',
        scope: {
            show: '='
        },
        replace: true, // Replace with the template below
        transclude: true, // we want to insert custom content inside the directive
        link: function(scope, element, attrs) {
            scope.dialogStyle = {};
            if (attrs.width)
                scope.dialogStyle.width = attrs.width;
            if (attrs.height)
                scope.dialogStyle.height = attrs.height;
            scope.hideModal = function() {
                scope.show = false;
            };
            scope.submitForm = function() {
                $http({
                    method  : 'POST',
                    url     : attrs.pathsend,
                    data    : {name: scope.name, email: scope.email, comment: scope.comment},
                })
                    .then(function(data) {
                        console.log(data);
/*
                        if (!data.success) {
                            // if not successful, bind errors to error variables
                            $scope.errorName = data.errors.name;
                            $scope.errorSuperhero = data.errors.superheroAlias;
                        } else {
                            // if successful, bind success message to message
                            $scope.message = data.message;
                        }*/
                    });
            };
        },
        templateUrl: function(elem,attrs) {
            return attrs.pathget;
        }
    };
}]);
App.controller('CallbackFormCtrl', function($scope) {
    $scope.modalShown = false;
    $scope.toggleModal = function() {
        $scope.modalShown = !$scope.modalShown;
    };

    $scope.spinner = false;
});