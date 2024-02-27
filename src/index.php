<?php

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
			  src="https://code.jquery.com/jquery-3.7.1.min.js"
			  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
			  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        $(function () {

            $('#do_ajax').on('click', function () {
                console.log('do_ajax');
                doAjax();
            });
            function doAjax () {
                $.ajax({
                    url: './api.php',
                    type: 'GET',
                    dataType: 'json',
                }).done(function (data, textStatus, jqXHR) {
                    console.log(data);
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                });
            }
        });
    </script>

    <button type="button" id="do_ajax">ajax</button>
    <button type="button" id="do_xml">xml</button>
    <button type="button" id="do_axios">axios</button>
    <script>
        document.getElementById('do_xml').addEventListener('click', function () {
            console.log('do_xml');
            doXml();
        });
        function doXml() {
            var data = {}
            var json = JSON.stringify(data);
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "./api.php");
            xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded;charset=UTF-8");
            xhr.send(json);
            xhr.onload = function () {
                console.log(xhr.responseText);
                var result = JSON.parse(xhr.responseText);
                console.log(result);
            };
        }
        function doAxios() {
            axios.get('./api.php', {
                params: {
                    id: 123,
                    category: 'electronics'
                },
            })
                .then(function (response) {
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
        document.getElementById('do_axios').addEventListener('click', function () {
            console.log('do_axios');
            doAxios();
        });
    </script>
</body>
</html>