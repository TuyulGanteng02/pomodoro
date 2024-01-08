<!DOCTYPE html>
<html>
<head>
  <title>Pomodoro Timer</title>
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
  <!-- Timer -->
  <div id="timer">
    <h1 id="time">25:00</h1>
    <h3 id="session-name"></h3>

    <button onclick="start()">Start</button>
    <button onclick="pause()">Pause</button>

    <button onclick="prevSession()" id="prev-session-btn">Prev Session</button> 
    <button onclick="nextSession()" id="next-session-btn">Skip Session</button>

    <h3>Current Task:</h3>
    <p id="task-name"></p>

    <button onclick="prevTask()">Prev Task</button>
    <button onclick="skipTask()">Skip Task</button>
  </div>

  <!-- Task List -->
  <div id="task-list">
    <h3>My Tasks</h3>
    <button onclick="addTask()">+ Add Task</button>
    <div id="tasks"></div>
  </div>

  <!-- Set Task Mode -->
  <div id="set-mode">
    <h3>Set Task Mode</h3>
    <button onclick="setDefault()">Default</button>
    <button onclick="setLong()">Long Timer</button> 
    <button onclick="setShort()">Short Timer</button>
    <button onclick="setCustom()">Custom</button>
    <div id="custom-form"></div>
  </div>

<script src="/js/main.js"></script>

</body>
</html>