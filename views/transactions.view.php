
<?php require "views/partials/head.php" ?>
<div class="flex h-[100dvh]">
<?php require "views/partials/sidebar.php" ?>
<main class=" basis-full p-10 relative">
    <p class="absolute message top-5 right-1/2 translate-x-1/2   w-[50%] bg-white text-green-400 px-4 py-2  flex justify-center rounded-md <?=isset($success) ? '' : 'hidden' ?>"><?=$success?></p>
    <h2 class="text-4xl font-bold">Transactions</h2>
    <ul class="flex w-full justify-between mt-10 text-lg font-semibold gap-5">
        <div class="basis-[42%]">
        <h3>Make a transaction</h3>
        <form action="" method="POST" class=" bg-cyan-600 py-5 px-3 rounded-md flex flex-col gap-2">
            <input type="hidden" name="hidden" id="hidden" value="transaction">
            <label for="type">Select type</label>
            <select required class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1"  name="type" id="type">
                <option value="" class="hidden">--transaction type</option>
                <option value='d'>deposit</option>
                <option value='w'>withdrawal</option>
            </select>
            <label for="amount">Choose amount</label>
            <input required class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1" id="amount" name="amount" type="number" placeholder='amount'>
            <button type="submit" class="font-semibold px-4 py-1 bg-green-500 hover:bg-green-700 transition-colors rounded-md mt-5">Proceed</button>
            <p class=" bg-white message text-red-500 rounded-md text-center px-2 <?=!empty($transactionError) ? '' : 'hidden'?>"><?=!empty($transactionError) ? $transactionError : ''?></p>
        </form>
        </div>
        <div class="basis-[42%]">
        <h3>Transfer money</h3>
        <form action="" method="POST" class=" bg-cyan-600 py-5 px-3 rounded-md flex flex-col gap-2">
            <input required type="hidden" name="hidden" id="hidden" value="transfer">
            <label for="type">Select receiver</label>
            <select required class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1"  name="id" id="id">
                <option value="" class="hidden">--choose receiver</option>
                <?php foreach($users as $user) : ?>
                    <option value="<?=$user['id']?>"><?=$user['name']?></option>
                <?php endforeach?>
       
            </select>
            <label for="amount">Choose amount</label>
            <input required class=" bg-slate-500 text-white outline-none rounded-md pl-2 py-1" id="amount" name="amount" type="number" placeholder='amount'>
            <button type="submit" class="font-semibold px-4 py-1 bg-green-500 hover:bg-green-700 transition-colors rounded-md mt-5">Proceed</button>
            <p class=" bg-white message text-red-500 rounded-md text-center px-2 <?=!empty($transferError) ? '' : 'hidden'?>"><?=!empty($transferError) ? $transferError : ''?></p>
        </form>
        </div>
    </ul>
</main>
</div>
<script src="scripts/transactions.js"></script>
<?php require "views/partials/footer.php" ?>