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

var noticeRef = firebase.database().ref('notices');
document.getElementById('notices').addEventListener('submit', submitForm);

// Form Submit
function submitForm(e) {
    e.preventDefault();

    // Get input Value
    var noticeTitle = getInputValues('noticeTitle');
    var noticeDescription = getInputValues('noticeDescription');

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
        noticeDescription: noticeDescription
    });
}

// Retirve Data From Firebase
var ref = firebase.database().ref("notices/");

ref.on("value", function(snapshot) {
        // console.log(snapshot.val().noticeDescription);
        if (snapshot.exists()) {
            var content = '';
            snapshot.forEach(function(data) {
                var val = data.val();
                // console.log(val.noticeDescription);
                // content = ' ';
                content += '<div>' + val.noticeTitle + '</div>';
                // content += '<td>' + val.name + '</td>';
                // content += '<td>' + val.quantity + '</td>';
                // content += '</tr>';
            });
            $('#showTitle').append(content);
        }

    },
    function(error) {
        console.log("Error: " + error.code);
    });