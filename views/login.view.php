<?php require "views/partials/head.php" ?>
<div class="mx-auto w-[500px] mt-10">
<h3 class="text-center font-bold text-3xl">Sign In</h3>
    <form action="/login" method="POST" class="space-y-4">
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
            <label class="flex items-center text-sm">
                <input type="checkbox" class="w-4 h-4 text-indigo-500 border-gray-300 rounded focus:ring-2 focus:ring-indigo-400">
                <span class="ml-2 text-gray-600">Remember Me</span>
            </label>
            <a href="#" class="text-sm text-indigo-500 hover:underline">Forgot Password?</a>
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
</div>
<?php require "views/partials/footer.php"?>     