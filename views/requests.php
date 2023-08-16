<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/static.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <head class="container mx-auto">
        <div class="p-4 flex justify-center text-center bg-violet-800">
            <h2 class="text-violet-50 font-sans  text-3xl">Ingreso de ticket</h2>
        </div>
    </head>
    <main class="container mx-auto">
        <div class="rounded bg-slate-100 container p-8 justify-center  flex flex-col">
        <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                echo '<h2 class = "text-xl p-3 bg-red-200 rounded mb-3 w-full mx-20 text-center text-red-600" >Llene todo los campos</h2>';
            }
            if(isset($_GET['alert']) && !empty($_GET['alert'])){
                if($_GET['alert'] == 1){
                    echo '<h2 class = "text-xl p-3 bg-green-200 rounded mb-3 w-full mx-20 text-center text-green-600" >Datos guardados correctamente</h2>';
                }else{
                    echo '<h2 class = "text-xl p-3 bg-red-200 rounded mb-3 w-full mx-20 text-center text-red-600" >Error al guardar los datos</h2>';
                }
            } ?>    
        <form id="container" action="<?php echo constant('URL')."ticket/enviarDatosTicket?type=consulta" ?>" method="POST" class="flex flex-col">
                <div class=" flex gap-8">
                    <div class="flex-rows ">
                        <div class="my-2">
                            <label class="font-sans text-neutral-500 leading-normal text-xl" for="motivo">Motivo</label>
                            <input class="rounded  font-sans outline-none w-full p-2" name="motivo" id="motivo" type="text" placeholder="Ingrese el motivo">
                        </div>
                        <div class="my-2">
                            <label class="font-sans  text-neutral-500 text-xl" for="nombre">Nombre completo</label>
                            <input class="font-sans rounded w-full outline-none w-full p-2" id="nombre" name="nombre" type="text">
                        </div>
                        <div class="my-2">
                            <label class="font-sans text-neutral-500 text-xl" for="rut">Rut</label>
                            <input class="font-sans w-full rounded outline-none w-full p-2" id="rut" name="rut" type="text">
                        </div>
                        <div class="my-2">
                            <label class="font-sans text-neutral-500 text-xl" for="telefono">Telefono de contacto</label>
                            <input class="font-sans w-full rounded outline-none w-full p-2" id="telefono" name="telefono" type="text">
                        </div>
                        <div class="my-2">
                            <label class="font-sans text-neutral-500 text-xl" for="correo">Correo</label>
                            <input class="font-sans w-full rounded outline-none w-full p-2" id="correo" name="correo" type="text">
                        </div>

                    </div>
                    <div class="flex-col flex">
                        <label class="text-neutral-500 text-xl" for="">Observacion</label>
                        <textarea name="message" class="outline-none  rounded w-full p-2" id="message" cols="100" rows="12"></textarea>
                        <div class=" mt-4 py-4 px-8   flex justify-between">
                            <div class="">
                                <select name="option" id="option" class="text-xl outline-none py-2 px-5 rounded border-2 border-red-900">
                                    <option value="consulta">Consulta</option>
                                    <option value="reclamo">Reclamo</option>
                                </select>
                            </div>
                            <div class="w-30">
                                <button  type="submit" class="rounded w-full text-violet-50 text-xl py-2 px-20 bg-violet-800 ">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer>

    </footer>
    <script type="module">
        const form = document.getElementById('option'); //
        const container = document.getElementById('container'); //
        const text = document.getElementById('message'); //
        const funct = (e) => {
            if (e.target.value === 'consulta') {
                container.action = 'ticket/enviarDatosTicket?type=consulta';
            } else {
                container.action = 'ticket/enviarDatosTicket?type=reclamo';
            }
        }

        form.addEventListener('click', funct);
        text.addEventListener('click', () => {
            text.scrollTop = text.scrollHeight;

        })
    </script>
</body>