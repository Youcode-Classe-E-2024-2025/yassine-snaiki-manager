<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full relative overflow-auto">

<form action="" method ="POST" class="form-message absolute bottom-1/2 translate-y-1/2 right-1/2 translate-x-1/2  bg-slate-600 w-[60%] flex flex-col p-4 rounded-md hidden">
<input type="hidden" id="hidden" name="hidden" value="message">
<input type="hidden" id="id" name="id" value="">
<label for="message" class="message-label font-semibold mb-3">Message</label>
<textarea name="message" id="message" class=" outline-none text-black max-w-full rounded-md max-h-20 p-2" placeholder="message here"></textarea>
<div class="flex gap-2 mt-5 self-center">
<button type="submit" class="px-10 py-2 bg-green-500 hover:bg-green-600 transition-colors w-fit   rounded-md">Send</button>
<button  class="px-10 py-2 bg-green-500 hover:bg-green-600 transition-colors w-fit   rounded-md cancel-message">Cancel</button>
</div>
</form>

<h2 class="text-3xl font-semibold pl-20 pt-5">Dashboard</h2>
<ul class="users-cnt flex flex-col gap-1 w-full px-10 mt-10">

    <?php 
    if(count($users) === 0)
           echo "<li class='flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between'>
                 No users exist
                 </li>";
    foreach($users as $user) : ?>
            <li class="flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between">
                <p><?=$user['name']?></p>
                <p><?=$user['email']?></p>
                <div class="flex gap-10">
                <button class="btn-message bg-green-500 rounded-md px-2 py-1 text-lg font-medium my-1 hover:bg-green-700 transition-colors" data-id="<?=$user['id']?>"  data-name="<?=$user['name']?>">message</button>
                <form action="" method="POST" >
                    <input type="hidden" name="hidden" id="hidden" value="archive">
                    <input type="hidden" name="id" id="id" value="<?=$user['id']?>">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 rounded-md px-2 py-1 text-lg font-medium my-1  transition-colors">archive</button>
                </form>
                </div>
            </li>
    <?php endforeach?>
        </ul>

        
    
</main>
</div>
<script src="scripts/admin-dashboard.js"></script>
<?php require "views/partials/footer.php" ?>