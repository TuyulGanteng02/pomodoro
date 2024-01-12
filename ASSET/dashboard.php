<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Pomodoro Timer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="pesan">
        <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == "gagal"){
                    echo "Username atau Password salah!";
                }else if($_GET['pesan'] == "logout"){
                    echo "Anda telah berhasil logout";
                }else if($_GET['pesan'] == "belum_login"){
                    echo "Anda harus login untuk mengakses halaman anggota";
                }else if($_GET['pesan'] == "selesai"){
                  echo "Task selesai dilakukan.";
                }else if($_GET['pesan'] == "tidakada"){
                  echo "Tidak ada task yang ditemukan";
              }
            }
            ?>
        </div>
  <div class="container-fluid">
    <header class="d-flex flex-wrap align-items-center text-bg-info justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <div class="form-check form-switch mx-4">
          <input
            class="form-check-input p-2"
            type="checkbox"
            role="switch"
            id="flexSwitchCheckChecked"
            checked
            onclick="myFunction()"
          />
        </div>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2" style="color: white;">Setting</a></li>
        <li><a href="dashboard.php" class="nav-link px-5" style="color: white;" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Pomodoro adalah metode manajemen waktu yang menggunakan timer untuk membagi pekerjaan menjadi interval, biasanya 25 menit. dipisahkan oleh istirahat singkat">Pomodoro</a> </li>
        <li><a href="login.php" class="nav-link px-5" style="color: white;">Account</a></li>
        <li><a href="logout.php" class="nav-link px-2" style="color: white;" onClick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
          <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
        </svg>
      </div>
    </header>

    <div class="container d-flex justify-content-center align-items-center text-center">
      <div class="row">
        <div class="col">
            <!-- Set Task Mode -->
            <div id="set-mode">
              <h3>Set Task Mode</h3>
              <button type="button" class="btn" id="default" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="setDefault()">Default</button>
              <button type="button" class="btn" id="long" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="setLong()">Long Timer</button> 
              <button type="button" class="btn" id="short" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="setShort()">Short Timer</button>
              <button type="button" class="btn" id="custom" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="setCustom()">Custom</button>
              <div id="custom-form"></div>
            </div>
        </div>
        <div class="col-6">
            <!-- Timer -->
          <div id="timer" >
            <h1 id="time">25:00</h1>
            <h3 id="session-name"></h3>
            <div>
            <button type="button" class="btn" id="start" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg); display: inline-block" onclick="toggleButtons()">Start</button>
            <button type="button" class="btn" id="pause" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg); display: none" onclick="toggleButtons()">Pause</button>
            <button type="button" class="btn"><i class="bi bi-skip-forward-btn-fill" style="font-size: 2rem; vertical-align: -.525em;" onclick="nextSession()"></i></button>
            </div>
            
<!-- <div>
<button type="button" class="btn" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="prevSession()" id="prev-session-btn">Prev Session</button> 
            <button type="button" class="btn" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="nextSession()" id="next-session-btn">Next Session</button>
</div> -->
            <h3>Current Task:</h3>

            <p id="task-name"></p>
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Nama User</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Durasi</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  		<tbody>
			<?php
$server = 'localhost';
$username = 'root';
$pass = '';
$database = 'pomodoro';
$masuk=$_SESSION['username'];
$id_user=$_SESSION['id_user'];

$db = mysqli_connect ($server, $username, $pass, $database);  
$sql="Select id_task, username, deskripsi, durasi, status FROM task INNER JOIN user ON task.id_user=user.id_user where status = 'belum selesai' and username='$masuk'";


$query = mysqli_query($db, $sql);
while ($row =mysqli_fetch_array($query)){
			?>
		<tr>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['deskripsi'];?></td>
	    <td><?php echo $row['durasi'];?></td>
            <td><?php echo $row['status'];?></td>
			
		</tr>
		<?php
			}
			?>
		</tbody>
</table>
        
            <button type="button" class="btn" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);" onclick="startTask()">Set Time Task 1</button>
            <a href="time.php"><button type="button" class="btn" style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);">Task 1 done</button></a>
          </div>
        </div>
        <div class="col">
          <!-- Task List -->
          <div id="task-list">
            <h3>My Tasks</h3>
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal"style="background-color: var(--bs-emphasis-color); color: var(--bs-body-bg);">+ Add Task</button>
            <div id="task">
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form name="form1" method="post" action="proses-task.php">
      <input type="hidden" id="id_user" name="id_user" value="<?php echo $id_user ?>">
	<div class="form-group">
      <label for="deskripsi">Deskripsi :</label>
      <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
    </div>
	  <div class="form-group">
      <label for="durasi">Durasi (Menit) :</label>
      <input type="number" name="durasi" id="durasi" class="form-control" placeholder="menit" required>
	  </div>
    <br>
		<input type="reset" class="btn btn-secondary" value="Reset">
    <input type="submit" class="btn btn-primary" value="Submit">
		<br />
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Tambahkan</button>
      </div>
    </div>
  </div>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
// Mendeklarasikan variabel durasiValue di tingkat global
var durasiValue;

document.addEventListener("DOMContentLoaded", function() {
  // Mendapatkan elemen tabel berdasarkan ID
  var table = document.getElementById("myTable");

  // Memastikan tabel ditemukan
  if (table) {
    // Mendapatkan semua baris (rows) dalam tabel
    var rows = table.getElementsByTagName("tr");

    // Memastikan ada setidaknya satu baris dalam tabel
    if (rows.length > 1) {
      // Mengambil nilai dari kolom "Durasi" pada baris pertama (indeks 1)
      durasiValue = rows[1].getElementsByTagName("td")[2];

      // Memastikan elemen ditemukan sebelum mencoba mengambil nilai innerHTML
      if (durasiValue) {
        console.log("Nilai Durasi: " + durasiValue.innerHTML);
      } else {
        console.error("Elemen Durasi tidak ditemukan");
      }
    } else {
      console.error("Tidak ada baris data dalam tabel");
    }
  } else {
    console.error("Tabel tidak ditemukan");
  }
});

// Mendeklarasikan fungsi startTask di tingkat global
function startTask() {
  workMinutes = durasiValue.innerHTML;
  breakMinutes = 10;
  longBreakMinutes = 15;
  sessionName = 'Work';
  currentSession = workMinutes * 60;
  updateDisplay();
  sessionNameElement.textContent = sessionName;
  taskMode = 'custom';
}


  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
function myFunction() {
        var element = document.body;
        element.dataset.bsTheme =
          element.dataset.bsTheme == "light" ? "dark" : "light";
      }
function toggleButtons() {
  var startButton = document.getElementById("start");
  var pauseButton = document.getElementById("pause");

  if (startButton.style.display === "inline-block") {
      startButton.style.display = "none";
      pauseButton.style.display = "inline-block";
      start();
  } else {
      startButton.style.display = "inline-block";
      pauseButton.style.display = "none";
      pause();
  }
}
</script>
</body>
</html>