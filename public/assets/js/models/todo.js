Todos.Todo = DS.Model.extend({
    title: DS.attr('string'),
    isCompleted: DS.attr('boolean')
});

// Todos.Todo.FIXTURES = [
//     {
//         id: 1,
//         title: 'משימה 1',
//         isCompleted: true
//     },
//     {
//         id: 2,
//         title: 'משימה 2',
//         isCompleted: false
//     },
//     {
//         id: 3,
//         title: 'משימה 3',
//         isCompleted: false
//     }
// ];