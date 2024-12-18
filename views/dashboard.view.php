
<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full p-10 overflow-auto">
    <h2 class="text-4xl font-bold">Dashboard</h2>
    <ul class="flex justify-between mt-10 text-lg font-semibold">
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">Balance</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
                $<?=$balance?>
            </div>
        </div>
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">Total deposits</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
            $<?=$totaldep?>
            </div>
        </div>
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">total withdrawals</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
            $<?=$totalwith?>
            </div>
        </div>
        
    </ul>
    <h2 class="text-2xl font-semibold text-center mt-20">Movements</h2>
    <ul class="flex flex-col w-full gap-1 justify-between mt-10 text-lg font-semibold ">
    <?php 
    if(count($movements) === 0)
           echo "<li class='flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between'>
                 No movements yet
                 </li>";
    foreach($movements as $movement) : ?>
            <li class="flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between">
                <p>$<?=$movement['amount']?></p>
                <p><?=$movement['created_at']?></p>
                <p><?=$movement['type']?></p>
                
            </li>
    <?php endforeach?>
        
    </ul>
</main>
</div>
<?php require "views/partials/footer.php" ?>

