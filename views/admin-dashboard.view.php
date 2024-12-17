
<?php require "views/partials/head.php" ?>
<nav class="w-full bg-cyan-400  py-2 px-4">
<div class="max-w-[1200px] flex justify-between mx-auto">
<h2 class="text-4xl font-bold">Admin</h2>
<a href="/logout" class=" px-3 py-1 bg-slate-200 text-black w-fit text-lg font-semibold flex items-center gap-4 hover:bg-gray-600 hover:text-white transition-colors">
       <img src="images/logout.png" alt="logout" class="w-5">    
       Log out</a>
</div>
</nav>
<main class=" basis-full p-10">
    
    <ul class="flex justify-between mt-10 text-lg font-semibold">
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">Balance</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
                $450.00
            </div>
        </div>
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">Total deposits</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
                $450.00
            </div>
        </div>
        <div class="basis-[30%]">
            <h3 class="text-center mb-4">total withdrawals</h3>
            <div class="w-full bg-cyan-600 h-20 rounded-sm flex justify-center items-center text-4xl font-semibold">
                $450.00
            </div>
        </div>
        
    </ul>
</main>
<?php require "views/partials/footer.php" ?>

