<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <!-- Link ke Bootstrap CDN -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .gradient-custom {
            background: radial-gradient(50% 123.47% at 50% 50%, #00ff94 0%, #720059 100%),
                linear-gradient(121.28deg, #669600 0%, #ff0000 100%),
                linear-gradient(360deg, #0029ff 0%, #8fff00 100%),
                radial-gradient(100% 164.72% at 100% 100%, #6100ff 0%, #00ff57 100%),
                radial-gradient(100% 148.07% at 0% 0%, #fff500 0%, #51d500 100%);
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <!-- <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100 rounded">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card todolist-card ">
                        <div class="card-body p-5">

                     
                            <form class="d-flex justify-content-center align-items-center mb-4" method="POST" action="?action=add">
                                <div data-mdb-input-init class="form-outline flex-fill">
                                    <input type="text" name="task" class="form-control" placeholder="New task...">
                                     <label class="form-label" for="form2">Website ini dibuat oleh Fadhil Ahmad Fathoni</label> 
                                </div>
                                <button type="submit" class="btn btn-info ms-2">Add</button>
                            </form>

                            <ul class="nav nav-tabs mb-4 pb-2" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active" aria-selected="false">Active</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
                                </li>
                            </ul>
      
                            <div class="tab-content" id="myTabContent">
                          
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                        <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                            <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                            <span <?= $todo['is_completed'] ? 'style="text-decoration: line-through;"' : '' ?>><?= $todo['task'] ?></span>
                                            <div class="ml-2">
                                                <?php if (!$todo['is_completed']): ?>
                                                    <a href="?action=complete&id=<?= $todo['id'] ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                                                <?php endif; ?>
                                                <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                     
                                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                            <?php if (!$todo['is_completed']): ?>
                                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                                    <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                                    <span><?= $todo['task'] ?></span>
                                                    <div class="ml-2">
                                                        <a href="?action=complete&id=<?= $todo['id'] ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                                                        <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                  
                                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                    <ul class="list-group mb-0">
                                        <?php foreach ($todos as $todo): ?>
                                            <?php if ($todo['is_completed']): ?>
                                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded" style="background-color: #f4f6f7;">
                                                    <input class="form-check-input me-2" type="checkbox" <?= $todo['is_completed'] ? 'checked' : '' ?> disabled />
                                                    <span style="text-decoration: line-through;"><?= $todo['task'] ?></span>
                                                    <div class="ml-2">
                                                        <a href="?action=delete&id=<?= $todo['id'] ?>" class="btn btn-danger btn-sm ml-2">Delete</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
            

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> -->

    <div class="flex justify-center items-center w-screen h-screen bg-slate-100">
        <div class="min-w-[42rem] min-h-[10rem] bg-white shadow-md rounded-xl px-8 py-5">
            <header>
                <h1 class="text-center text-2xl font-[300]">Todo List App</h1>
            </header>
            <main>
                <div class="w-full flex gap-1 mt-5">
                    <form class="w-full flex gap-1 mt-5 mb-5" method="POST" action="?action=add">
                        <input name="task" class="text-slate-500 w-full outline-none px-3 h-[2.5rem] border-[1px] border-slate-300 rounded-xl" type="text">
                        <button type="submit" class="w-[5rem] h-[2.5rem] bg-blue-500 text-sm text-white rounded-2xl hover:bg-blue-700 transition-all">Save</button>
                    </form>
                </div>
                <div>




                    <div class="text-sm font-medium text-center text-gray-500 border-b border-slate-400 ">
                        <ul class="flex flex-wrap -mb-px">
                            <li class="me-2">
                                <a href="?status=all" class="inline-block p-4 <?= $_GET["status"] === "all" ? "border-b-2 text-blue-500 border-blue-600" : "border-transparent" ?>   rounded-t-lg " aria-current="page">All</a>
                            </li>
                            <li class="me-2">
                                <a href="?status=completed" class="inline-block p-4 <?= $_GET["status"] === "completed" ? "border-b-2 text-blue-500 border-blue-600" : "border-transparent" ?> rounded-t-lg">completed</a>
                            </li>
                            <li class="me-2">
                                <a href="?status=onprogress" class="inline-block p-4 <?= $_GET["status"] === "onprogress" ? "border-b-2 text-blue-500 border-blue-600" : "border-transparent" ?> rounded-t-lg ">on progress</a>
                            </li>
                        </ul>
                    </div>
                    <div class="relative shadow-md sm:rounded-lg mt-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 border-[1px] border-slate-300 overflow-hidden">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Todo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        action
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($todos as $todo): ?>
                                    <?php if ($_GET["status"] === "all"): ?>
                                        <tr class="bg-white border-b border-slate-300">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                <?= $todo["task"] ?>
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                <?= $todo["is_completed"] ? "completed" : "on progress" ?>
                                            </th>

                                            <td class="flex gap-2 px-6 py-4">
                                                <a href="?action=complete&id=<?= $todo['id'] ?>" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">mark as completed</button></a>
                                                <a href="?action=delete&id=<?= $todo['id'] ?>"
                                                    <button type=" button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button></a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($_GET["status"] === "completed"): ?>
                                        <?php if ($todo["is_completed"]) :  ?>
                                            <tr class="bg-white border-b border-slate-300">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                    <?= $todo["task"] ?>
                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                    <?= $todo["is_completed"] ? "completed" : "on progress" ?>
                                                </th>

                                                <td class="flex gap-2 px-6 py-4">
                                                    <a href="?action=complete&id=<?= $todo['id'] ?>" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">mark as completed</button></a>
                                                    <a href="?action=delete&id=<?= $todo['id'] ?>"
                                                        <button type=" button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button></a>
                                                </td>
                                            </tr>
                                        <?php endif;  ?>
                                    <?php endif; ?> <?php if ($_GET["status"] === "onprogress"): ?>
                                        <?php if (!$todo["is_completed"]) :  ?>
                                            <tr class="bg-white border-b border-slate-300">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                    <?= $todo["task"] ?>
                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-slate-500">
                                                    <?= $todo["is_completed"] ? "completed" : "on progress" ?>
                                                </th>

                                                <td class="flex gap-2 px-6 py-4">
                                                    <a href="?action=complete&id=<?= $todo['id'] ?>" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">mark as completed</button></a>
                                                    <a href="?action=delete&id=<?= $todo['id'] ?>"
                                                        <button type=" button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button></a>
                                                </td>
                                            </tr>
                                        <?php endif;  ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </main>
        </div>

    </div>

</body>

</html>