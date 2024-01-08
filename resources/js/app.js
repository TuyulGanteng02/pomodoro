import './bootstrap';

// Default Pomodoro Timer Values
let workMinutes = 25;
let breakMinutes = 10;
let longBreakMinutes = 15;
let sessionName = 'Work';
let currentSession = workMinutes * 60;
let taskMode = 'default';

// DOM Elements
let timeElement = document.getElementById('time');
let sessionNameElement = document.getElementById('session-name');
let taskNameElement = document.getElementById('task-name');
let tasksElement = document.getElementById('tasks');
let customFormElement = document.getElementById('custom-form');
let currentTaskIndex = 0;
let tasks = [];
let sessionOrder = [];
let intervalId;

function updateDisplay() {
 let minutes = Math.floor(currentSession / 60);
 let seconds = currentSession % 60;
 timeElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

function start() {
  setTask();
  if (!intervalId) {
      intervalId = setInterval(() => {
        currentSession--;
        updateDisplay();
        if (currentSession <= 0) {
          pause();
          nextSession();
        }
      }, 1000);
  }
}

function pause() {
 clearInterval(intervalId);
 intervalId = null;
}

function addTask() {
 let taskName = prompt('Enter task name:');
 if (taskName) {
    let taskElement = document.createElement('p');
    taskElement.textContent = taskName;
    tasksElement.appendChild(taskElement);
    tasks.push(taskName);
 }
}

function setTask() {
  if(currentTaskIndex >= tasks.length) {
    currentTaskIndex = 0; 
  }
  let nextTask = tasks[currentTaskIndex];
  taskNameElement.textContent = nextTask;
  currentTaskIndex++;
}

function setDefault() {
 workMinutes = 25;
 breakMinutes = 10;
 longBreakMinutes = 15;
 currentSession = workMinutes * 60;
 updateDisplay();
 sessionNameElement.textContent = sessionName;
 taskMode = 'default';
 generateSessionOrder();
}

function setLong() {
 workMinutes = 30;
 breakMinutes = 15;
 longBreakMinutes = 20;
 currentSession = workMinutes * 60;
 updateDisplay();
 sessionNameElement.textContent = sessionName;
 taskMode = 'long';
 generateSessionOrder();
}

function setShort() {
 workMinutes = 20;
 breakMinutes = 5;
 longBreakMinutes = 10;
 currentSession = workMinutes * 60;
 updateDisplay();
 sessionNameElement.textContent = sessionName;
 taskMode = 'short';
 generateSessionOrder();
}

function setCustom() {
    if(!isLoggedIn()) {
        window.location.href = "/login"; 
        return;
    }
    let work = prompt('Work minutes:');
    let breakLength = prompt('Break minutes:');
    let longBreakLength = prompt('Long break minutes:');
    if (work && breakLength) {
        workMinutes = parseInt(work);
        breakMinutes = parseInt(breakLength);
        longBreakMinutes = parseInt(longBreakLength);
        currentSession = workMinutes * 60;
        updateDisplay();
        sessionNameElement.textContent = sessionName;
        taskMode = 'custom';
        generateSessionOrder();
    }
}

function isLoggedIn() {
    let authToken = localStorage.getItem('authToken');  
    if(!authToken) {
      return false;
    }  
    try {      
      let payload = decodeJWT(authToken);
      let now = new Date().getTime()/1000;  
      if(payload.exp < now) {
        return false;
      }  
    } catch (e) {
      return false;
    }  
    return true;  
}
  
function decodeJWT(token) {
    let base64Url = token.split('.')[1]; 
    let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    let jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
      return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));  
    return JSON.parse(jsonPayload);
}

function generateSessionOrder() {
  sessionOrder = [];
  for(let i = 0; i < 2; i++) {
    sessionOrder.push('Work');
    sessionOrder.push('Break');
  }
  sessionOrder.push('Long Break');
}

function prevSession() {
  let prevBtn = document.getElementById('prev-session-btn');  
  let last = sessionOrder.pop();
  sessionOrder.unshift(last);
  if (last === 'Work') {
    currentSession = workMinutes * 60;
    sessionName = 'Work';
  } else if (last === 'Break') { 
    currentSession = breakMinutes * 60;
    sessionName = 'Break';
  } else if (last === 'Long Break') {
    currentSession = longBreakMinutes * 60;
    sessionName = 'Long Break';
  }  
  if(sessionOrder.length === 0) {
     prevBtn.disabled = true;
     return;
  }
  updateDisplay();
  sessionNameElement.textContent = sessionName;
  setTask();
}

function nextSession() {
  let nextBtn = document.getElementById('next-session-btn');  
  let next = sessionOrder.shift(); 
  if (next === 'Work') {
    currentSession = workMinutes * 60;
    sessionName = 'Work';
  } else if (next === 'Break') {
    currentSession = breakMinutes * 60;
    sessionName = 'Break';
  } else if (next === 'Long Break') {
    currentSession = longBreakMinutes * 60; 
    sessionName = 'Long Break';
  }
  if(sessionOrder.length === 5) {
    nextBtn.disabled = true;
    return; 
  } 
  updateDisplay();
  sessionNameElement.textContent = sessionName;
  setTask();
}

function prevTask() {
  pause();
  if (tasks.length > 0) {
    tasks.pop();
    updateTasks();
  }
}
 
function skipTask() {
  pause();
  tasks.shift();
  updateTasks();
}
 
function updateTasks() {
  tasksElement.innerHTML = '';
  tasks.forEach(taskName => {
    let taskElement = document.createElement('p');
    taskElement.textContent = taskName;
    tasksElement.appendChild(taskElement);
  });
}

function init() {
  updateDisplay();
  sessionNameElement.textContent = sessionName;
  updateTasks();
  if (taskMode === 'default') {
    setDefault();
  } else {
    setCustom();
  }
}

init();