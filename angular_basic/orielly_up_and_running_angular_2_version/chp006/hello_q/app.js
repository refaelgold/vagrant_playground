angular.module('myModule', [])

    .factory('HelloWorld', function($q, $timeout) {

        var getMessages = function() {
            var deferred = $q.defer();

            $timeout(function() {
                deferred.resolve(['Hello', 'world']);
            }, 1000);

            return deferred.promise;
        };

        return {
            getMessages: getMessages
        };

    })

    .controller('HelloCtrl', function($scope, HelloWorld) {

        $scope.messages = HelloWorld.getMessages();

    });