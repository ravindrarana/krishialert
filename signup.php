<?php include 'header.php' ?>
<form class="w-full max-w-sm p-5" id="register">
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Email
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" type="email" placeholder="Email">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="password" type="password" placeholder="******************">
    </div>
  </div>
 
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"   type="submit">
        Register
      </button>
    </div>
  </div>
</form>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"></script>
<script>
var firebaseConfig = {
    apiKey: "AIzaSyDTV4JfuTCg1vdwxIzwToVPcPeX1On_LYY",
    authDomain: "krishi-alert.firebaseapp.com",
    databaseURL: "https://krishi-alert.firebaseio.com",
    projectId: "krishi-alert",
    storageBucket: "krishi-alert.appspot.com",
    // messagingSenderId: "18692720090",
    // appId: "1:18692720090:web:8e8dbb25775a607737ece3",
    // measurementId: "G-LNKEEX6N81"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Script for User Management
firebase.auth().onAuthStateChanged(function(user) {
    window.user = user;
    // Step 1:
    //  If no user, sign in anonymously with firebase.auth().signInAnonymously()
    //  If there is a user, log out out user details for debugging purposes.
});

// Handle SignUp Page
document.querySelector('#register').addEventListener('submit', submitForm);

function submitForm(e){
    e.preventDefault();

    // Get Values from Form
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var credential = firebase.auth.EmailAuthProvider.credential(email, password);
    var auth = firebase.auth();
    var currentUser = auth.currentUser;

    auth.createUserWithEmailAndPassword(email, password).then(cred =>{
        console.log(cred.user);
    });
}
// {
//     e.preventDefault();
//     e.stopPropagation();
//     var username = document.querySelector('#username').value;
//     var password = document.querySelector('#password').value
//     var credential = firebase.auth.EmailAuthProvider.credential(username, password);
//     var auth = firebase.auth();
//     var currentUser = auth.currentUser;

//     // Step 2
//     //  Get a credential with firebase.auth.emailAuthProvider.credential(emailInput.value, passwordInput.value)
//     //  If there is no current user, log in with auth.signInWithCredential(credential)
//     //  If there is a current user an it's anonymous, atttempt to link the new user with firebase.auth().currentUser.link(credential) 
//     //  The user link will fail if the user has already been created, so catch the error and sign in.
// });

// function to get input values
function getInputValues(id) {
    return document.getElementById(id).value;
}

// document.querySelector('#sign-out').addEventListener('click', function(e) {
//     e.preventDefault();
//     e.stopPropagation();
//     firebase.auth().signOut();
// });
</script>
</body>
</html>