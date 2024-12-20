
<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full p-10 overflow-auto">
    <h2 class="text-4xl font-bold">history</h2>
    
    
    <ul class="flex flex-col w-full gap-1 justify-between mt-10 text-lg font-semibold ">
    <?php 
    if(count($history) === 0)
           echo "<li class='flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between'>
                 No procedures were done yet
                 </li>";
    foreach(array_reverse($history) as $h) : ?>
            <li class="flex items-center text-xl font-semibold <?=$h['type'] === 't' ? 'text-red-500' : 'text-green-500'?> bg-cyan-100 px-10 justify-between">
                <p class="">$<?=$h['amount']?></p>
                <p class=""><?=$h['type']==='t' ? 'transfered' : 'received'?></p>
                <p class=""><?=$h['name']?></p>
                <p><?=$h['created_at']?></p>   
            </li>
    <?php endforeach?>
        
    </ul>
</main>
</div>
<?php require "views/partials/footer.php" ?>

