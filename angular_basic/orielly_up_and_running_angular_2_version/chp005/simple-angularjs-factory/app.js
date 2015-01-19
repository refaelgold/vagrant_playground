angular.module('notesApp',[])

    .controller('MainCtrl', [function() {
        var self = this;
        self.tab = 'first';
        self.open = function(tab) {
            self.tab = tab;
        };
    }])
    .controller('SubCtrl', ['ItemService',
        function(ItemService) {
            var self = this;
            self.list = function() {
                //return the list of factory
                return ItemService.list();
            };
            self.add = function() {
                //take the factory method
                ItemService.add({
                    id: self.list().length + 1,
                    label: 'Item ' + self.list().length//take the id number
                });
            };
        }])

    //here is the list definition - easy way without define an API
    //'add function are allowed to the parent controller and child because its a service and the scope is wider'
    .factory('ItemService', [function() {
        //define only once
        var items = [
            {id: 1, label: 'Item 0'},
            {id: 2, label: 'Item 1'}
        ];
        return {
            list: function() {
                return items;
            },
            add: function(item) {
                items.push(item);
            }
        };

    }]);