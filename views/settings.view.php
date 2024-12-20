
<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full p-10 relative">
    <p class="absolute message top-5 right-1/2 translate-x-1/2   w-[50%] bg-white text-red-400 px-4 py-2  flex justify-center rounded-md <?=isset($error) ? '' : 'hidden' ?>"><?=$error?></p>
    <h2 class="text-4xl font-bold">Settings</h2>
    <ul class="flex flex-col w-full gap-2 justify-between mt-20 text-lg font-semibold ">
    <button class='btn-changepassword flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between hover:bg-cyan-800 transition-colors'>
     Change password
    </button>
    <button class='btn-closeaccount flex items-center text-xl font-semibold bg-cyan-600 px-10 justify-between hover:bg-cyan-800 transition-colors'>
     Close account
    </button>
    </ul>
        <div class="basis-[42%]">
        <form action="" method="POST" class="form-changepassword absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] bg-cyan-600 py-5 px-3 rounded-md flex flex-col gap-2 hidden">
            <h3 class=" text-center font-semibold text-lg">Change password</h3>
            <input type="hidden" name="hidden" id="hidden" value="changepassword">
            <label for="type">Old password</label>
            <input class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1" id="password" name="password" type="password" placeholder='old password'>
            <label for="amount">new password</label>
            <input class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1" id="new-password" name="new-password" type="password" placeholder='new password'>
            
            <button type="submit" class="font-semibold px-4 py-1 bg-green-500 hover:bg-green-700 transition-colors rounded-md mt-5">Change</button>
            <button  class="btn-cancel font-semibold px-4 py-1 bg-yellow-500 hover:bg-yellow-700 transition-colors rounded-md">Cancel</button>
        </form>
        </div>
        <div class="basis-[42%]">
        <form action="" method="POST" class="form-closeaccount absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] bg-cyan-600 py-5 px-3 rounded-md flex flex-col gap-2 hidden">
            <h3 class=" text-center font-semibold text-lg">Close account</h3>
            <input type="hidden" name="hidden" id="hidden" value="closeaccount">
            <label for="type">enter password</label>
            <input class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1" id="password" name="password" type="password" placeholder='****'>
            <button type="submit" class="font-semibold px-4 py-1 bg-green-500 hover:bg-green-700 transition-colors rounded-md mt-5">confirm</button>
            <button  class="btn-cancel font-semibold px-4 py-1 bg-yellow-500 hover:bg-yellow-700 transition-colors rounded-md">cancel</button>
        </form>
        </div>
    
</main>
</div>
<script src="scripts/settings.js"></script>
<?php require "views/partials/footer.php" ?>