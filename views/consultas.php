<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/static.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <header class=" flex  gap-10  bg-violet-800 ">
        <div class="flex-1 gap-4 w-80 p-4 ">
            <a class="text-violet-50 font-sans py-2 px-6 border text-xl" href="http://localhost/GestionDeClientesPHP/ticket/revisarConsultas">Consultas</a>
            <a class="text-violet-50 font-sans py-2  px-6 border text-xl" href="http://localhost/GestionDeClientesPHP/ticket/revisarReclamos">Reclamos</a>
        </div>
        <div class=" p-4 shrink-0  w-40">
            <h2 class="text-violet-50 font-sans  text-3xl">Responder</h2>

        </div>
        <div class="flex-1 flex justify-end">
            <div class=" items-center justify-center bg-sky-500 font-bold flex text-xl w-60 h-full text-white">Usuario 1</div>
        </div>
    </header>
    <main class="container m-auto">
        <div class="rounded bg-slate-100 container my-8 p-5  justify-center items-center flex flex-col ">
            <p class="text-xl font-sans mb-3 ">Lista de consultas</p>
            <?php if (isset($_GET['msg']) && !empty($_GET['msg'])) {
                echo '<h2 class = "text-xl p-3 bg-green-200 rounded mb-3 w-full mx-20 text-center text-green-600" >Guardado correctamente</h2>';
            } ?>
            <?php if (empty($this->data)) { ?>
                <h2>No hay datos</h2>
            <?php } else { ?>
                <table class="table-fixed  hover:table-fixed ">
                    <thead>
                        <tr class="">
                            <th class=" p-5 px-10  text-xl border border-slate-600 text-gray-600 font-sans">Consulta</th>
                            <th class="p-5 px-10 text-xl border border-slate-600 text-gray-600 font-sans">Estado</th>
                            <th class="p-5 px-10 text-xl border border-slate-600 text-gray-600  font-sans">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->data as $key => $value) { ?>
                            <tr>
                                <td class="p-5 px-10 text-xl border border-slate-600 text-gray-500 font-sans"><?php echo $value['motivo'] ?></td>
                                <td class="p-5 px-10 text-xl border border-slate-600 text-gray-500 font-sans"><?php echo $value['estado'] ?></td>
                                <td class="p-5  px-10 text-xl border border-slate-600 text-gray-500 font-sans"><a href="http://localhost/GestionDeClientesPHP/ticket/seleccionarTicket?ticket_id=<?php echo  $value['ticket_id'] ?>" class="rounded w-full text-violet-50 p-4 bg-violet-800">ver detalles</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </main>
    <footer>

    </footer>

</body>