window.Todos = Ember.Application.create();

/** stub adapter */
// Todos.ApplicationAdapter = DS.FixtureAdapter.extend();

/** local storage adapter */
Todos.ApplicationAdapter = DS.LSAdapter.extend({
    namespace: 'todos-emberjs'
});

/** rest api adapter */
Todos.ApplicationAdapter = DS.RESTAdapter.extend({
    namespace: 'api/v1'
});