$("#continue2").attr("disabled", "disabled");
$('#canvas').show();
$('#play-video').click(function () {
    $('#videos').show();
    $('#canvas').show();
    $("#continue2").attr("disabled", "disabled");

});

var video = document.getElementById('videos');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.srcObject = stream;
        video.play();
    });
}

var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('videos');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
    context.drawImage(video, 0, 0, 160, 130);
    var img = canvas.toDataURL('image/png');
    if(img) {
        $("#continue2").removeAttr("disabled");
    }

    document.getElementById('image').value = img;
    $('#canvas').show();
    // $('#videos').hide();
});
