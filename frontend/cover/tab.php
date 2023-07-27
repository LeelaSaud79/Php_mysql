<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PSW1MY7HB4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-PSW1MY7HB4');
    </script>
    <title>Tab in Javascript</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .tab {
            overflow: hidden;
            background-color: lightblue;
            display: flex;
            width: 280px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }


        .tab button {
            background-color: lightgrey;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 8px 10px;
            transition: 0.3s;
            font-size: initial;
            flex: 1;
        }

        .tab button:hover {
            background-color: lightslategray;
        }

        /* create an active/current tablink class */
        .tabcontent {
            display: none;
            padding: 12px;
            border: 1px solid #ccc;
            border-top: none;
            margin-top: 10px;
        }

        /* Updated CSS */
        .tabcontainer {
            margin-right: auto;
            margin-left: auto;
            margin-top: 10px;
            width: 280px;
        }


        .tabcontent.active {
            display: block;
        }
    </style>
</head>

<body>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'des')">Description</button>
        <button class="tablinks" onclick="openCity(event, 'rating')">Rating</button>
        <button class="tablinks" onclick="openCity(event, 'Add')">Other Information</button>
    </div>

    <div class="tabcontainer">
        <div id="des" class="tabcontent">
            <h3>Description</h3>
            <p>This product is very good and can be used in various sectors.</p>
        </div>

        <div id="rating" class="tabcontent">
            <h3>Rating</h3>
            <p>As this is the beginning, so this is our first day of creating.</p>
        </div>

        <div id="Add" class="tabcontent">
            <h3>Additional Information</h3>
            <p>Here additional information is added.</p>
        </div>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).classList.add("active");
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>