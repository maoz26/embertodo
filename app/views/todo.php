<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Ember.js • TodoMVC</title>
<!--    <link rel="stylesheet" href="styles/style.css">-->
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        button {
            margin: 0;
            padding: 0;
            border: 0;
            background: none;
            font-size: 100%;
            vertical-align: baseline;
            font-family: inherit;
            color: inherit;
            -webkit-appearance: none;
            /*-moz-appearance: none;*/
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }

        body {
            font: 14px 'Helvetica Neue', Helvetica, Arial, sans-serif;
            line-height: 1.4em;
            color: #4d4d4d;
            width: 550px;
            margin: 0 auto;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -ms-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
        }

        #todoapp {
            background: #fff;
            background: rgba(255, 255, 255, 0.9);
            margin: 130px 0 40px 0;
            border: 1px solid #ccc;
            position: relative;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.2),
            0 25px 50px 0 rgba(0, 0, 0, 0.15);
        }

        #todoapp:before {
            content: '';
            border-left: 1px solid #f5d6d6;
            border-right: 1px solid #f5d6d6;
            width: 2px;
            position: absolute;
            top: 0;
            left: 40px;
            height: 100%;
        }

        #todoapp input::-webkit-input-placeholder {
            font-style: italic;
        }

        #todoapp input:-moz-placeholder {
            font-style: italic;
            color: #a9a9a9;
        }

        #todoapp h1 {
            position: absolute;
            top: -120px;
            width: 100%;
            font-size: 70px;
            font-weight: bold;
            text-align: center;
            color: #b3b3b3;
            color: rgba(255, 255, 255, 0.3);
            text-shadow: -1px -1px rgba(0, 0, 0, 0.2);
            -webkit-text-rendering: optimizeLegibility;
            -moz-text-rendering: optimizeLegibility;
            -ms-text-rendering: optimizeLegibility;
            -o-text-rendering: optimizeLegibility;
            text-rendering: optimizeLegibility;
        }

        #header {
            padding-top: 15px;
            border-radius: inherit;
        }

        #header:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            height: 15px;
            z-index: 2;
            border-bottom: 1px solid #6c615c;
            background: #8d7d77;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(132, 110, 100, 0.8)),to(rgba(101, 84, 76, 0.8)));
            background: -webkit-linear-gradient(top, rgba(132, 110, 100, 0.8), rgba(101, 84, 76, 0.8));
            background: -moz-linear-gradient(top, rgba(132, 110, 100, 0.8), rgba(101, 84, 76, 0.8));
            background: -o-linear-gradient(top, rgba(132, 110, 100, 0.8), rgba(101, 84, 76, 0.8));
            background: -ms-linear-gradient(top, rgba(132, 110, 100, 0.8), rgba(101, 84, 76, 0.8));
            background: linear-gradient(top, rgba(132, 110, 100, 0.8), rgba(101, 84, 76, 0.8));
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#9d8b83', EndColorStr='#847670');
            border-top-left-radius: 1px;
            border-top-right-radius: 1px;
        }

        #new-todo,
        .edit {
            position: relative;
            margin: 0;
            width: 100%;
            font-size: 24px;
            font-family: inherit;
            line-height: 1.4em;
            border: 0;
            outline: none;
            color: inherit;
            padding: 6px;
            border: 1px solid #999;
            box-shadow: inset 0 -1px 5px 0 rgba(0, 0, 0, 0.2);
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            -moz-font-smoothing: antialiased;
            -ms-font-smoothing: antialiased;
            -o-font-smoothing: antialiased;
            font-smoothing: antialiased;
        }

        #new-todo {
            padding: 16px 16px 16px 60px;
            border: none;
            background: rgba(0, 0, 0, 0.02);
            z-index: 2;
            box-shadow: none;
        }

        #main {
            position: relative;
            z-index: 2;
            border-top: 1px dotted #adadad;
        }

        label[for='toggle-all'] {
            display: none;
        }

        #toggle-all {
            position: absolute;
            top: -42px;
            left: -4px;
            width: 40px;
            text-align: center;
            border: none; /* Mobile Safari */
        }

        #toggle-all:before {
            content: '»';
            font-size: 28px;
            color: #d9d9d9;
            padding: 0 25px 7px;
        }

        #toggle-all:checked:before {
            color: #737373;
        }

        #todo-list {
            /*text-align: right;*/
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #todo-list li {
            position: relative;
            font-size: 24px;
            border-bottom: 1px dotted #ccc;
        }

        #todo-list li:last-child {
            border-bottom: none;
        }

        #todo-list li.editing {
            border-bottom: none;
            padding: 0;
        }

        #todo-list li.editing .edit {
            display: block;
            width: 506px;
            padding: 13px 17px 12px 17px;
            margin: 0 0 0 43px;
        }

        #todo-list li.editing .view {
            display: none;
        }

        #todo-list li .toggle {
            text-align: center;
            width: 40px;
            /* auto, since non-WebKit browsers doesn't support input styling */
            height: auto;
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto 0;
            border: none; /* Mobile Safari */
            -webkit-appearance: none;
            /*-moz-appearance: none;*/
            -ms-appearance: none;
            -o-appearance: none;
            appearance: none;
        }

        #todo-list li .toggle:after {
            content: '✔';
            line-height: 43px; /* 40 + a couple of pixels visual adjustment */
            font-size: 20px;
            color: #d9d9d9;
            text-shadow: 0 -1px 0 #bfbfbf;
        }

        #todo-list li .toggle:checked:after {
            color: #85ada7;
            text-shadow: 0 1px 0 #669991;
            bottom: 1px;
            position: relative;
        }

        #todo-list li label {
            word-break: break-word;
            padding: 15px;
            margin-left: 45px;
            display: block;
            line-height: 1.2;
            -webkit-transition: color 0.4s;
            -moz-transition: color 0.4s;
            -ms-transition: color 0.4s;
            -o-transition: color 0.4s;
            transition: color 0.4s;
        }

        #todo-list li.completed label {
            color: #a9a9a9;
            text-decoration: line-through;
        }

        #todo-list li .destroy {
            display: none;
            position: absolute;
            top: 0;
            right: 10px;
            bottom: 0;
            width: 40px;
            height: 40px;
            margin: auto 0;
            font-size: 22px;
            color: #a88a8a;
            -webkit-transition: all 0.2s;
            -moz-transition: all 0.2s;
            -ms-transition: all 0.2s;
            -o-transition: all 0.2s;
            transition: all 0.2s;
        }

        #todo-list li .destroy:hover {
            text-shadow: 0 0 1px #000,
            0 0 10px rgba(199, 107, 107, 0.8);
            -webkit-transform: scale(1.3);
            -moz-transform: scale(1.3);
            -ms-transform: scale(1.3);
            -o-transform: scale(1.3);
            transform: scale(1.3);
        }

        #todo-list li .destroy:after {
            content: '✖';
        }

        #todo-list li:hover .destroy {
            display: block;
        }

        #todo-list li .edit {
            display: none;
        }

        #todo-list li.editing:last-child {
            margin-bottom: -1px;
        }

        #footer {
            color: #777;
            padding: 0 15px;
            position: absolute;
            right: 0;
            bottom: -31px;
            left: 0;
            height: 20px;
            z-index: 1;
            text-align: center;
        }

        #footer:before {
            content: '';
            position: absolute;
            right: 0;
            bottom: 31px;
            left: 0;
            height: 50px;
            z-index: -1;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3),
            0 6px 0 -3px rgba(255, 255, 255, 0.8),
            0 7px 1px -3px rgba(0, 0, 0, 0.3),
            0 43px 0 -6px rgba(255, 255, 255, 0.8),
            0 44px 2px -6px rgba(0, 0, 0, 0.2);
        }

        #todo-count {
            float: left;
            text-align: left;
        }

        #filters {
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            right: 0;
            left: 0;
        }

        #filters li {
            display: inline;
        }

        #filters li a {
            color: #83756f;
            margin: 2px;
            text-decoration: none;
        }

        #filters li a.selected {
            font-weight: bold;
        }

        #clear-completed {
            float: right;
            position: relative;
            line-height: 20px;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.1);
            font-size: 11px;
            padding: 0 10px;
            border-radius: 3px;
            box-shadow: 0 -1px 0 0 rgba(0, 0, 0, 0.2);
        }

        #clear-completed:hover {
            background: rgba(0, 0, 0, 0.15);
            box-shadow: 0 -1px 0 0 rgba(0, 0, 0, 0.3);
        }

        #info {
            margin: 65px auto 0;
            color: #a6a6a6;
            font-size: 12px;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.7);
            text-align: center;
        }

        #info a {
            color: inherit;
        }

        /*
            Hack to remove background from Mobile Safari.
            Can't use it globally since it destroys checkboxes in Firefox and Opera
        */
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            #toggle-all,
            #todo-list li .toggle {
                background: none;
            }

            #todo-list li .toggle {
                height: 40px;
            }

            #toggle-all {
                top: -56px;
                left: -15px;
                width: 65px;
                height: 41px;
                -webkit-transform: rotate(90deg);
                transform: rotate(90deg);
                -webkit-appearance: none;
                appearance: none;
            }
        }

        .hidden{
            display:none;
        }

    </style>
</head>

<body>
<script type="text/x-handlebars" data-template-name="todos">
    <section id="todoapp">
        <header id="header">
            <h1></h1>
            {{input type="text"
                    id="new-todo"
                    placeholder="הוספת משימה"
                    value=newTitle
                    action="createTodo"
            }}
        </header>

         <section id="main">
              <ul id="todo-list">
              {{#each todo in model itemController="todo"}}
                  <li {{bind-attr class="todo.isCompleted:completed todo.isEditing:editing"}}>
                    {{#if todo.isEditing}}
                        {{edit-todo class="edit" value=todo.title focus-out="acceptChanges"
                           insert-newline="acceptChanges"}}

                    {{else}}
                      {{input type="checkbox" checked=todo.isCompleted class="toggle"}}
                      <label {{action "editTodo" on="doubleClick"}}>{{todo.title}}</label>
                      <button {{action "removeTodo"}} class="destroy"></button>
                    {{/if}}
                  </li>
              {{/each}}
            </ul>
            <input type="checkbox" id="toggle-all">
        </section>
        <footer id="footer">
            <span id="todo-count">
                <strong>{{remaining}}</strong> {{inflection}} left
            </span>
            <ul id="filters">
                <li>
                    <a href="all" class="selected">All</a>
                </li>
                <li>
                    <a href="active">Active</a>
                </li>
                <li>
                    <a href="completed">Completed</a>
                </li>
            </ul>
            <button id="clear-completed">Clear completed (1)</button>
        </footer>
    </section>

    <footer id="info">
        <p>Double-click to edit a todo</p>
    </footer>
</script>

<!-- external libs -->
<script src="/assets/js/jquery-1.11.2.min.js"></script>
<script src="/assets/js/handlebars-v1.3.0.js"></script>
<script src="/assets/js/ember.js"></script>
<script src="/assets/js/ember-data.js"></script>
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

