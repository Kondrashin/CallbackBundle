<<<<<<< HEAD
App.directive('modalDialog', ['$http', function ($http) {
=======
App.directive('modalDialog', ['$http', function($http) {
>>>>>>> f51e16dc6e2782d8a6ee012b018271637e2f54b8
    return {
        restrict: 'E',
        scope: {
            show: '='
        },
        replace: true, // Replace with the template below
        transclude: true, // we want to insert custom content inside the directive
<<<<<<< HEAD
        link: function (scope, element, attrs) {
            scope.dialogStyle = {};
            scope.done = false;
=======
        link: function(scope, element, attrs) {
            scope.dialogStyle = {};
>>>>>>> f51e16dc6e2782d8a6ee012b018271637e2f54b8
            if (attrs.width)
                scope.dialogStyle.width = attrs.width;
            if (attrs.height)
                scope.dialogStyle.height = attrs.height;
<<<<<<< HEAD
            scope.hideModal = function () {
                scope.show = false;
                scope.done = false;
                scope.name = '';
                scope.email = '';
                scope.comment = '';
            };
            scope.submitForm = function () {
                $http({
                    method: 'POST',
                    url: attrs.pathsend,
                    headers: {'Content-Type': 'application/json'},
                    data: {name: scope.name, email: scope.email, comment: scope.comment, save: ''}
                })
                    .then(function (response) {
                        data = response.data;
                        if (data.success) {
                            scope.done = true;
                        } else {
                            scope.errors = data.errors;
                            console.log(data);
                            console.log(data.errors);
                        }
                    });
            };
        },
        templateUrl: function (elem, attrs) {
=======
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
>>>>>>> f51e16dc6e2782d8a6ee012b018271637e2f54b8
            return attrs.pathget;
        }
    };
}]);
<<<<<<< HEAD
App.controller('CallbackFormCtrl', function ($scope) {
    $scope.modalShown = false;
    $scope.toggleModal = function () {
=======
App.controller('CallbackFormCtrl', function($scope) {
    $scope.modalShown = false;
    $scope.toggleModal = function() {
>>>>>>> f51e16dc6e2782d8a6ee012b018271637e2f54b8
        $scope.modalShown = !$scope.modalShown;
    };

    $scope.spinner = false;
});