<?php require "views/partials/head.php" ?>
<div class="mx-auto w-[500px] mt-10 relative min-h-[100dvh]">
    <div class="absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-70%] flex flex-col justify-center items-center w-full <?=!$signedup ?'hidden':'' ?>" id="checked">
        <div class=" w-32 h-32  bg-slate-600 shadow-md rounded-full flex flex-col justify-center items-center " >
            <img src="images/check.png" class="w-20" alt="checked">
        </div>
        <p class="text-center font-semibold text-lg">Your request has been submited <br/> wait for approval</p>
        <a
        href="/login"     
        class="w-full block text-center px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 mt-10">
        return to login page
    </a>
    </div>
    <h3 class="text-center font-bold text-3xl">Sign Up</h3>
    <form action="" method="POST" class="space-y-4 <?=$signedup ?'hidden':'' ?>">
        <div>
            <label for="username" class="block text-sm font-medium text-white">User name</label>
            <input 
            type="text" 
            id="username" 
            name="username" 
            required 
            class="w-full px-4 py-2 mt-2 text-gray-800 bg-gray-100 border rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="username"
            />
        </div>
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
        <div>
            <label for="confirm_password" class="block text-sm font-medium text-white">Confirm password</label>
            <input 
            type="password" 
            id="confirm_password" 
            name="confirm_password" 
            required 
            class="w-full px-4 py-2 mt-2 text-gray-800 bg-gray-100 border rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="********"
            />
        </div>
        <div class="flex items-center justify-between">
            <label class="flex items-center text-sm">
                <input type="checkbox" class="w-4 h-4 text-indigo-500 border-gray-300 rounded focus:ring-2 focus:ring-indigo-400">
                <span class="ml-2 text-gray-600">Remember Me</span>
            </label>
            <a href="#" class="text-sm text-indigo-500 hover:underline">Forgot Password?</a>
        </div>
        <button 
        type="submit" 
        class="w-full px-4 py-2 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Submit
    </button>
        <a
        href="/login"     
        class="w-full block text-center px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
        Already have an account
    </a>
</form>
</div>
<script src="scripts/signup.js"></script>
<?php require "views/partials/footer.php"?>     