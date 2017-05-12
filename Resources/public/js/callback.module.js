App.directive('modalDialog', ['$http', function ($http) {
    return {
        restrict: 'E',
        scope: {
            show: '='
        },
        replace: true, // Replace with the template below
        transclude: true, // we want to insert custom content inside the directive
        link: function (scope, element, attrs) {
            scope.dialogStyle = {};
            scope.done = false;
            if (attrs.width)
                scope.dialogStyle.width = attrs.width;
            if (attrs.height)
                scope.dialogStyle.height = attrs.height;
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
            return attrs.pathget;
        }
    };
}]);
App.controller('CallbackFormCtrl', function ($scope) {
    $scope.modalShown = false;
    $scope.toggleModal = function () {
        $scope.modalShown = !$scope.modalShown;
    };

    $scope.spinner = false;
});