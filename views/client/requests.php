<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/static.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            font-family: "font-sans";
        }
    </style>
</head>

<body>

    <head class="container mx-auto">
        <div class="p-4 flex justify-center text-center bg-violet-800">
            <h2 class="text-violet-50 text-3xl">Ingreso de ticket</h2>
        </div>
    </head>
    <main class="container mx-auto">
        <div class="rounded bg-slate-100 container p-8 justify-center  flex">
            <form id="container" action="ticket/sendDatasTickets?type=consulta" method="POST" class="flex flex-col">
                <div class=" flex gap-8">
                    <div class="flex-rows ">
                        <div class="my-2">
                            <label class="text-neutral-500 text-xl" for="motivo">Motivo</label>
                            <input class="rounded  outline-none w-full p-2" name="motivo" id="motivo" type="text" placeholder="Ingrese el motivo">
                        </div>
                        <div class="my-2">
                            <label class="text-neutral-500 text-xl" for="nombre">Nombre completo</label>
                            <input class=" rounded w-full outline-none w-full p-2" id="nombre" name="nombre" type="text">
                        </div>
                        <div class="my-2">
                            <label class="text-neutral-500 text-xl" for="rut">Rut</label>
                            <input class="w-full rounded outline-none w-full p-2" id="rut" name="rut" type="text">
                        </div>
                        <div class="my-2">
                            <label class="text-neutral-500 text-xl" for="telefono">Telefono de contacto</label>
                            <input class="w-full rounded outline-none w-full p-2" id="telefono" name="telefono" type="text">
                        </div>
                        <div class="my-2">
                            <label class="text-neutral-500 text-xl" for="correo">Correo</label>
                            <input class="w-full rounded outline-none w-full p-2" id="correo" name="correo" type="text">
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
                container.action = 'ticket/sendDatasTickets?type=consulta';
            } else {
                container.action = 'ticket/sendDatasTickets?type=reclamo';
            }
        }

        form.addEventListener('click', funct);
        text.addEventListener('click', () => {
            text.scrollTop = text.scrollHeight;

        })
    </script>
</body>