
<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full p-10">
    <h2 class="text-4xl font-bold">Messages</h2>
    <ul class="flex flex-col w-full gap-5 justify-between mt-10 text-lg font-semibold ">
    <?php 
    if(count($messages) === 0)
           echo "<li class='flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between'>
                 No messages exist
                 </li>";
    foreach($messages as $message) : ?>
            <li class="flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between">
                <p><?=$message['text']?></p>
                <p><?=$message['created_at']?></p>
                <div class="flex gap-10">
                <form action="" method="POST" >
                    <input type="hidden" name="hidden" id="hidden" value="delete-message">
                    <input type="hidden" name="id" id="id" value="<?=$message['id']?>">
                    <button class="bg-red-500 hover:bg-red-700 rounded-md px-2 py-1 text-lg font-medium my-1  transition-colors">delete</button>
                </form>
                </div>
            </li>
    <?php endforeach?>
        
    </ul>
</main>
</div>
<?php require "views/partials/footer.php" ?>