<?php  require_once "helpers.php"; ?>
<aside class="flex flex-col items-center bg-slate-600 h-full w-[240px] shadow-lg pt-4">
    <span class="rounded-full w-20 h-20 bg-slate-300 flex justify-center items-center text-4xl mb-4">
        PN
    </span>
    <h2 class=" border-b-2 font-semibold"><?=$profileName?></h2>
    <ul class="links flex flex-col w-full mt-20 gap-y-3 mb-20 text-black text-lg font-semibold">
       <a href="/dashboard" class=" pl-6 py-1  w-full flex items-center gap-4  transition-colors  <?=isPath('/admin-dashboard') || isPath('/dashboard') ? 'bg-gray-600 text-white' : 'bg-slate-200 hover:bg-gray-600 hover:text-white' ?>">
       <img src="images/dashboard.png" alt="dashboard" class="w-5">    
       Dashboard</a>
       <a href="<?=$profileName==='Admin' ? '/requests' : '/messages'?>" class=" pl-6 py-1  w-full flex items-center gap-4  transition-colors  <?=isPath('/requests') || isPath('/messages') ? 'bg-gray-600 text-white' : 'bg-slate-200 hover:bg-gray-600 hover:text-white' ?>">
       <img src="images/messages.png" alt="messages" class="w-5">    
       <?=$profileName==='Admin' ? 'Requests' : 'Messages'?></a>
       <a href="/settings" class=" pl-6 py-1  w-full flex items-center gap-4  transition-colors  <?=isPath('/settings') ? 'bg-gray-600 text-white' : 'bg-slate-200 hover:bg-gray-600 hover:text-white' ?> <?=$_SESSION['role'] === 'a' ? 'hidden' : ""?>">
       <img src="images/settings.png" alt="settings" class="w-5">    
       Settings</a>
       <a href='<?=$profileName==='Admin' ? '/archived' : '/maketransaction'?>' class=' pl-6 py-1   w-full flex items-center gap-4  transition-colors  <?=isPath('/isarchavied') || isPath('/maketransaction') ? 'bg-gray-600 text-white' : 'bg-slate-200 hover:bg-gray-600 hover:text-white' ?>  '>
       <img src='images/archived.png' alt='archived' class='w-5'>    
       <?=$profileName==='Admin' ? 'Archive' : 'transactions'?></a> 
       </ul>
       <a href="/logout" class=" pl-6 py-1 text-black w-full text-lg font-semibold flex items-center gap-4  transition-colors bg-slate-200 hover:bg-gray-600 hover:text-white">
       <img src="images/logout.png" alt="logout" class="w-5">    
       Log out</a>
</aside>