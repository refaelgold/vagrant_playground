// File: chapter3/controllerSpec.js
describe('Controller: ListCtrl', function() {
  // Instantiate a new version of my module before each test
  beforeEach(module('notesApp'));

  var ctrl;

  // Before each unit test, instantiate a new instance
  // of the controller
  beforeEach(inject(function($controller) {
    ctrl = $controller('ListCtrl');
  }));


    //call to items only
  it('should have items available on load', function() {
    expect(ctrl.items).toEqual([
      {id: 1, label: 'First', done: true},
      {id: 2, label: 'Second', done: false}
    ]);
  });


  it('should have highlight items based on state', function() {
    var item = {id: 1, label: 'First', done: true};


  //check if it true
    var actualClass = ctrl.getDoneClass(item);//get the function with the item

    expect(actualClass.finished).toBeTruthy();//it like return result
    expect(actualClass.unfinished).toBeFalsy();
    expect(actualClass.runner).toEqual("boom");


  //reverse action
    item.done = false;
    actualClass = ctrl.getDoneClass(item);


    expect(actualClass.finished).toBeFalsy();
    expect(actualClass.unfinished).toBeTruthy();
  });

});
