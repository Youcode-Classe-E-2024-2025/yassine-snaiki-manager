<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full overflow-auto">
    <h2 class="text-3xl font-semibold pl-20 pt-5">Requests</h2>
        <ul class="flex flex-col gap-1 w-full px-10 mt-10">
            <?php 
            if(count($users) === 0)
            echo "<li class='flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between'>
                  No users exist
                  </li>";
            foreach($users as $user) :?>
                <li class="flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between">
                <p><?=$user['name']?></p>
                <p><?=$user['email']?></p>
                <div class="flex gap-6">
                    <form action="" method='POST'>
                        <input type="hidden" name="hidden" id="hidden" value="reject">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <button type="submit" class=" bg-red-500 rounded-md px-2 py-1 text-lg font-medium my-1 hover:bg-red-700 transition-colors">reject</button>
                    </form>
                    <form action="" method='POST'>
                        <input type="hidden" name="hidden" id="hidden" value="approve">
                        <input type="hidden" name="id" value="<?=$user['id']?>">
                        <button type="submit" class=" bg-slate-500 rounded-md px-2 py-1 text-lg font-medium my-1 hover:bg-slate-700 transition-colors">approve</button>
                    </form>
                </div>
            </li>
            <?php endforeach?>
        </ul>
    
</main>
</div>
<?php require "views/partials/footer.php" ?>