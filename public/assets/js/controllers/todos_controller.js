Todos.TodosController = Ember.ArrayController.extend({
    actions: {
        clearCompleted: function() {
            var completed = this.filterBy('isCompleted', true);
            // invoke - execute those methods on each object in the Array if the method exists on that object
            completed.invoke('deleteRecord');
            completed.invoke('save');
        },
        createTodo: function() {
            // Get the todo title set by the "New Todo" text field
            var title = this.get('newTitle');
            if (!title.trim()) { return; }

            // Create the new Todo model
            var todo = this.store.createRecord('todo', {
                title: title,
                isCompleted: false
            });

            // Clear the "New Todo" text field
            this.set('newTitle', '');

            // Save the new model
            todo.save();
        }
    },


    /** check if all the todos are done */
    allAreDone: function(key, value) {
        if (value === undefined) {
            return !!this.get('length') && this.isEvery('isCompleted', true);
        } else {
            this.setEach('isCompleted', value);
            this.invoke('save');
            return value;
        }
    }.property('@each.isCompleted'),


    /** check if any completed exist */
    hasCompleted: function() {
        return this.get('completed') > 0;
    }.property('completed'),


    /**
     * returns an instance of EmberArray which contains only the items for which the callback returns true.
     */
    completed: function() {
        return this.filterBy('isCompleted', true).get('length');
    }.property('@each.isCompleted'),


    /** number of todos whose isCompleted */
    remaining: function() {
        return this.filterBy('isCompleted', false).get('length');
    }.property('@each.isCompleted'),


    /** either a plural or singular version of the word "item"  */
    inflection: function() {
        var remaining = this.get('remaining');
        return remaining === 1 ? 'item' : 'items';
    }.property('remaining')

});