<?php require "views/partials/head.php" ?>

<div class="mx-auto w-[500px] mt-10 relative min-h-[100dvh]">
    <div class=" min-w-32 min-h-32 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-100%] bg-slate-600 shadow-md rounded-full flex justify-center items-center hidden" id="checked">
         SUBMITTING...
    </div>
<h3 class="text-center font-bold text-3xl">Sign In</h3>
    <form action="/login" method="POST" class="space-y-4">
        <input class='hidden' type="hidden" name='csrf_token' value="<?=$_SESSION['csrf_token']?>">
        <div>
            <label for="email" class="block text-sm font-medium text-white">Email Address</label>
            <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            class="w-full px-4 py-2 mt-2 text-gray-800 bg-gray-100 border rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="you@example.com"
            />
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-white">Password</label>
            <input 
            type="password" 
            id="password" 
            name="password" 
            required 
            class="w-full px-4 py-2 mt-2 text-gray-800 bg-gray-100 border rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="********"
            />
        </div>
        <div class="flex items-center justify-between">
            
        </div>
        <button 
        type="submit" 
        class="w-full px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Sign In
    </button>
        <a
        href="/signup"     
        class="w-full block text-center px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Sign Up
    </a>
</form>
<div id="message" class="message text-red-600 bg-white text-lg mt-4 flex justify-center py-2 rounded-md shadow-md hidden"></div>

<div  class='message text-red-600 bg-white text-lg mt-4 flex justify-center py-2 rounded-md shadow-md <?=isset($message) ? '':'hidden'?>'><?=isset($message) ? $message : ''?></div>


</div>
<script src="scripts/login.js"></script>
<?php require "views/partials/footer.php"?>     