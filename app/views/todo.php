<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ember.js • TodoMVC</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <!-- handlebars -->
    <script type="text/x-handlebars" data-template-name="todos">
        <section id="todoapp">
            <header id="header">
                <h1></h1>
                {{input type="text"
                        id="new-todo"
                        placeholder="הוספת משימה"
                        value=newTitle
                        action="createTodo"}}
            </header>

             <section id="main">
              {{outlet}}
              {{input type="checkbox" id="toggle-all" checked=allAreDone}}
            </section>
            <footer id="footer">
                <span id="todo-count">
                    <strong>{{remaining}}</strong> {{inflection}} left
                </span>
                <ul id="filters">
                    <li>
                      {{#link-to "todos.index" activeClass="selected"}}All{{/link-to}}
                    </li>
                    <li>
                      {{#link-to "todos.active" activeClass="selected"}}Active{{/link-to}}
                    </li>
                    <li>
                      {{#link-to "todos.completed" activeClass="selected"}}Completed{{/link-to}}
                    </li>
                </ul>
                {{#if hasCompleted}}
                <button id="clear-completed" {{action "clearCompleted"}}>
                    Clear completed ({{completed}})
                </button>
                {{/if}}
            </footer>
        </section>

        <footer id="info">
            <p>Double-click to edit a todo</p>
        </footer>
    </script>
    <script type="text/x-handlebars" data-template-name="todos/index">
      <ul id="todo-list">
        {{#each todo in model itemController="todo"}}
          <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>
            {{#if todo.isEditing}}
              {{edit-todo class="edit" value=todo.title focus-out="acceptChanges" insert-newline="acceptChanges"}}
            {{else}}
              {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
              <label {{action "editTodo" on="doubleClick"}}>{{todo.title}}</label><button {{action "removeTodo"}} class="destroy"></button>
            {{/if}}
          </li>
        {{/each}}
      </ul>
    </script>
    <!-- external libs -->
    <script src="/assets/js/external/jquery-1.11.2.min.js"></script>
    <script src="/assets/js/external/handlebars-v1.3.0.js"></script>
    <script src="/assets/js/external/ember.js"></script>
    <script src="/assets/js/external/ember-data.js"></script>
    <script src="/assets/js/external/localstorage_adapter.js"></script>
    <!-- ember routes -->
    <script src="/assets/js/application.js"></script>
    <script src="/assets/js/router.js"></script>
    <!-- models -->
    <script src="/assets/js/models/todo.js"></script>
    <!-- views -->
    <script src="/assets/js/views/edit_todo_view.js"></script>
    <!-- controllers -->
    <script src="/assets/js/controllers/todos_controller.js"></script>
    <script src="/assets/js/controllers/todo_controller.js"></script>
</body>

</html>

