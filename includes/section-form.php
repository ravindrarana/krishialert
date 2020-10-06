<?php include '../header.php' ?>
<form class="w-full max-w-lg p-10 mb-5" id="notices">
<div class="bg-teal-800 p-5 mb-4 -mx-3">
<h1 class="text-center text-white uppercase font-bold">Dashboard to place Notice</h1>
</div>
  <div class="flex flex-wrap -mx-3 mb-6">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Notice Title
      </label>
  <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="noticeTitle" type="text" placeholder="Notice Title">
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
  <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Notice Description
      </label>
  <textarea class="resize-x border rounded focus:outline-none focus:shadow-outline h-48  w-full" id="noticeDescription"></textarea>
  </div>
  <button class="-mx-3 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
  Register Notice
</button>
</form>

<?php include '../footer.php' ?>