<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>WebCam</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">

        <style type="text/css">

            #content{
                margin: 0 auto;
                width:1000px;
                position:relative;
            }
            .fotografia{
                width: 320px;
                height: 240px;
                border:20px solid #333;
                background:#eee;
                -webkit-border-radius: 20px;
                -moz-border-radius: 20px;
                border-radius: 20px;
                position:relative;
                margin-top:50px;
                margin-bottom:50px;
            }

            .marca {
                z-index:2;
                position:absolute;
                color:#eee;
                font-size:10px;
                bottom: -16px;
                left:152px;
            }

            #obturador,#guardarFoto{
                padding:10px;
                border:1px solid;
                background-color:#444;
                color: #FFF;
                cursor:pointer;
                margin-left:50px
            }

        </style>

    </head>
    <body>
        <div id="content">
            <div style="float:left;width:50%">
                <div id="webcam" class="fotografia">
                    <span class="marca">tutorialesvirtuales.com</span>
                </div>
            </div>
            <div style="float:left; width:50%">
                <div id="say-cheese-snapshots" class="fotografia">
                    <span class="marca">snapshot</span>
                </div>
            </div>
            <div style="clear:both"></div>

            <div style="float:left;width:50%">
                <span id="obturador">Tomar Foto</span>
            </div>

            <div style="float:left;width:50%">
                <span id="guardarFoto">Guardar Foto</span>
            </div>

            <div class="fotografia">
                <img id="fotoGuardada" src="" style="display:none" />
                <span class="marca">Foto Almacenada</span>
            </div>

        </div>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'></script>
        <script src="<?php echo base_url() ?>assets/js/say-cheese.js"></script>
        <script type="text/javascript">
            var img=null;
            var sayCheese = new SayCheese('#webcam', {
                snapshots: true,
                width: 320,
                height: 240
            });

            sayCheese.start();

            $('#obturador').bind('click', function(e) {
                sayCheese.takeSnapshot(320,240);
                return false;
            })

            sayCheese.on('snapshot', function(snapshot) {
                img = document.createElement('img');

                $(img).on('load', function() {
                    $('#say-cheese-snapshots').html(img);
                });
                img.src = snapshot.toDataURL('image/png');
            });

            $('#guardarFoto').bind('click', function() {
                var src = img.src;
                data = {
                    src: src
                }
                $.ajax({
                    url: '<?php echo base_url() ?>webcam/ajax',
                    data: data,
                    type: 'post',
                    success: function(respuesta) {
                        $('#fotoGuardada').attr('src', respuesta).show(500);
                    }
                });
            });
        </script>
    </body>
</html>

