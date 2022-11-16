<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    // <script src="qrcode.min.js"></script>
    <!-- <script src="instascan.min.js"></script> -->
</head>
<body>
    <div class="container">
        <input type="text" id="qrText" onkeyup="generate()">
        <div id="setImage"></div>

    </div>

    <div class="container">
       <video width="50%" id="MyCameraOpen"></video>
       <input type="text" id="setText">

    </div>


    
    <script>
        var qrText=document.getElementById("qrText")
        var setImage=document.getElementById("setImage")

        var NewImage=new QRCode(setImage,{
            width:200,
            height:200
        })

        function generate(){
            var data=qrText.value
           // alert(data)
            NewImage.makeCode(data)
        }

    </script>

    <script>
        var video=document.getElementById("MyCameraOpen")
        var setText=document.getElementById("setText")

        var scanner=new Instascan.Scanner({
            video : video
        });

        Instascan.Camera.getCameras()
        .then(function(Our_Camera){
                if(Our_Camera.length > 0){
                    scanner.start(Our_Camera[0])
                    console.log(Our_Camera)
                }else{
                    alert("something went wrong")
                }
        })
        .catch(function(error){
                console.log(error)
        });
        scanner.addListener('scan', function (content) {
            setText.value=content
        });
    </script>

    <!-- <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });
      </script> -->
    
</body>
</html>