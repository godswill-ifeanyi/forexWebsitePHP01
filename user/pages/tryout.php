<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"
          content="IE=edge">
    <meta name="viewport"
          content="width=device-width,
                   initial-scale=1.0">
    <style>
        .popup {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            display: none;
        }
        .popup-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888888;
            width: 30%;
            height: 400px;
            font-weight: bolder;
        }
        .popup-content button {
            display: block;
            margin: 0 auto;
        }
        .show {
            display: block;
        }
        h1 {
            color: green;
        }
        @media only screen and (max-width: 480px) {
            .popup-content {
                width: 70%;
            }
        }
    </style>
</head>
 
<body>
    <h1>GeeksforGeeks</h1>
    <h3>Create popup box using HTML and CSS</h3>
    <button id="myButton">
          Click me
      </button>
    <div id="myPopup" class="popup">
        <div class="popup-content">
            <h1 style="color:green;">
                  GeekforGeeks !
              </h1>
            <p>This is a popup box!</p>
            <button id="closePopup">
                  Close
              </button>
        </div>
    </div>

    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
 
    <script>
        myButton.addEventListener("click", function () {
            myPopup.classList.add("show");
        });
        closePopup.addEventListener("click", function () {
            myPopup.classList.remove("show");
        });
        window.addEventListener("click", function (event) {
            if (event.target == myPopup) {
                myPopup.classList.remove("show");
            }
        });
    </script>
</body>
</html>