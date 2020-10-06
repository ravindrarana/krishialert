<?php include 'header.php' ?>
<form class="w-full max-w-lg p-10 mb-5" id="notices">
<div class="bg-teal-800 p-5 mb-4 -mx-3">
<h1 class="text-center text-white uppercase font-bold">Dashboard to place Notice</h1>
<div class="showTitle text-white"></div>
</div>
  <div class="flex flex-wrap -mx-3 mb-6">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Notice Title
      </label>
  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="noticeTitle" type="text" placeholder="Notice Title">
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Notice Description
      </label>
  <textarea class="resize-x border rounded focus:outline-none focus:shadow-outline h-48  w-full" id="noticeDescription"></textarea>
  </div>

  <!-- Image upload -->
  <div class="flex flex-wrap -mx-3 my-6">
      <progress value="0" max="100" id="uploader" class="my-4">0%</progress>
      <input type="file" value="upload" id="fileButton">
  </div>
  <!-- End Image Upload -->

  <button class="-mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
  Register Notice
</button>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.15.0/firebase-storage.js"></script>
<script>
// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
var firebaseConfig = {
    apiKey: "AIzaSyDTV4JfuTCg1vdwxIzwToVPcPeX1On_LYY",
    authDomain: "krishi-alert.firebaseapp.com",
    databaseURL: "https://krishi-alert.firebaseio.com",
    projectId: "krishi-alert",
    storageBucket: "krishi-alert.appspot.com",
    messagingSenderId: "18692720090",
    appId: "1:18692720090:web:8e8dbb25775a607737ece3",
    measurementId: "G-LNKEEX6N81"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Code for File Upload
// Get Elements
var uploader = document.getElementById('uploader');
var fileButton = document.getElementById('fileButton');

// Listen for File selection
fileButton.addEventListener('change', function(e){
// Get file
var file = e.target.files[0];

//Create a Storage ref
var storageRef = firebase.storage().ref('demo/' + file.name);

// Upload File
var task = storageRef.put(file);



// Upload progress bar
task.on('state_changed',
  function progress(snapshot){
    var percentage = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
    uploader.value = percentage;
    console.log(percentage);
  },
  function error(err){

  },
  function complete(){

  },

  );
});
// End File Upload



// Code for Notice
var noticeRef = firebase.database().ref('notices');
document.getElementById('notices').addEventListener('submit', submitForm);

// Form Submit
function submitForm(e) {
    e.preventDefault();

    // Get input Value
    var noticeTitle = getInputValues('noticeTitle');
    var noticeDescription = getInputValues('noticeDescription');
    // var fileButton = getInputValues('fileButton');

    // Sace Data
    saveNotice(noticeTitle, noticeDescription);

    // Reset after submit
    document.getElementById('notices').reset();

}

// function to get input values
function getInputValues(id) {
    return document.getElementById(id).value;
}

// Save Notice to firebase
function saveNotice(noticeTitle, noticeDescription) {
    var newNoticeRef = noticeRef.push();
    newNoticeRef.set({
        noticeTitle: noticeTitle,
        noticeDescription: noticeDescription,
        // file: fileButton
    });
}

// Retirve Data From Firebase
// var ref = firebase.database().ref("notices/");

// ref.on("value", function(snapshot) {
//         // console.log(snapshot.val().noticeDescription);
//         if (snapshot.exists()) {
//             var content = '';
//             snapshot.forEach(function(data) {
//                 var val = data.val();
//                 // console.log(val.noticeDescription);
//                 // content = ' ';
//                 content += '<div>' + val.noticeTitle + '</div>';
//                 // content += '<td>' + val.name + '</td>';
//                 // content += '<td>' + val.quantity + '</td>';
//                 // content += '</tr>';
//             });
//             $('#showTitle').append(content);
//         }

//     },
//     function(error) {
//         console.log("Error: " + error.code);
//     });
</script>

<!-- <script src="js/script.js"></script> -->
</body>
</html>