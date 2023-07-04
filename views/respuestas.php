<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuestas</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <head class="container mx-auto">
        <div class="relative p-4 flex justify-center text-center bg-violet-800">
            <h2 class="text-violet-50 font-sans  text-3xl">Responder</h2>
            <div class="absolute top-0 right-0 flex justify-center items-center w-60 h-full bg-sky-500 font-bold text-xl text-white">Usuario 1</div>
        </div>
    </head>
    <main class="container mx-auto">
        <?php
        foreach ($this->data as $key => $value) {
        ?>
            <form class="flex bg-slate-100 container my-8 p-5" action="http://localhost/GestionDeClientesPHP/ticket/answerTicket?ticketId=<?php echo $value['ticket_id']."&equipoId=5&tipo=".$value['categoria'].""?>" method="POST">
                <div class="flex flex-col w-1/3 h-full p-3">
                    <div class="flex flex-col mb-5">
                        <label class="font-sans text-neutral-800 leading-normal text-xl" for="motivo">Nombre completo</label>
                        <p class=" text-gray-500 font-sans "><?php echo $value['nombre'] . " " . $value['apellido'] . ""; ?></p>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label class="font-sans text-neutral-800 leading-normal text-xl" for="motivo">Rut</label>
                        <p class="text-gray-500 font-sans"><?php echo $value['run'] ?></p>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label class="font-sans text-neutral-800 leading-normal text-xl" for="motivo">Telefono</label>
                        <p class="text-gray-500 font-sans"><?php echo $value['telefono'] ?></p>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label class="font-sans text-neutral-800leading-normal text-xl" for="motivo">Correo</label>
                        <p class="text-gray-500 font-sans"><?php echo $value['email'] ?></p>
                    </div>
                </div>
                <div class="flex flex-col p-3">
                    <div class=" flex gap-8">
                        <div class="flex-1 flex flex-col rounded ">
                            <div class="mb-5">
                                <label class="text-neutral-800 text-xl" for="">Consulta</label>
                                <p name="message" class=" text-gray-500 font-sans text-xl" id="message"><?php echo $value['motivo'] ?></p>
                            </div>
                            <div class="mb-5">
                                <label class="text-neutral-800 text-xl" for="">Observacion</label>
                                <p name="message" class=" text-gray-500 font-sans text-xl" id="message"><?php echo $value['descripcion'] ?></p>
                            </div>
                        </div>
                        <div class="flex-1 ">
                            <label class="text-neutral-800 text-xl" for="">Respuesta</label>
                            <textarea name="message" class="outline-none  rounded w-full p-2" id="message" cols="100" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="flex mt-6 justify-end w-30">
                        <button type="submit" class="rounded text-violet-50 text-xl py-2 px-20 bg-violet-800 ">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        <?php
        }
        ?>
    </main>
</body>

</html>