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
    <main class="container mx-auto ">
        <div class=" p-3 flex text-center justify-center flex-col">
            <div class="mx-10">
                <p class="text-xl font-sans mb-2">Tipo de observacion</p>
                <select name="option" id="option" class="text-xl outline-none py-2 px-5 rounded border-2 border-red-900">
                    <option value="consulta ">Consulta</option>
                    <option value="reclamo">Reclamo</option>
                </select>
            </div>
        </div>
        <div class="rounded bg-slate-100 container p-8 justify-center  flex">
            <form id="container" action="ticket/sendDatasTickets?type=consulta" method="POST" class="flex flex-col">
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
                        <div class="mt-4">
                            <button type="submit" class="font-sans rounded w-full text-violet-50 text-xl p-2 bg-violet-800 ">
                                Enviar
                            </button>
                        </div>
                    </div>
                    <div class="flex-col flex">
                        <label class="text-neutral-500 font-sans text-xl" for="">Observacion</label>
                        <textarea name="message" class="font-sans outline-none  rounded w-full p-2" id="message" cols="100" rows="12"></textarea>
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