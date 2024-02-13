<?php 
    include '../../partials/Header.php'; 
    include '../../partials/navigation.php'; 
   
    $msg = isset($_GET['msg']) ? $_GET['msg'] : null;
?>
<div class="bg-indigo-100 flex justify-center items-center bg-cover">
	<div class="lg:w-2/5 md:w-1/2 w-2/3 mt-20 mb-20">
    <?php if (isset($msg)): ?>
        <div class="mb-4 text-red-500">
          <?= $msg ?>
        </div>
      <?php endif; ?>
      
		<form class="bg-white p-10 rounded-lg shadow-lg min-w-full" action="<?= BASE_PATH ?>config/add_news.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="added_by" value="<?= $_SESSION['student_num'] ?>"></input>
			<h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Add News</h1>
            <div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="title">News Title</label>
				<input type="text"  class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"  name="title" id="title" placeholder="News Title"></input>
            </div>
            <div>
				<label class="text-gray-800 font-semibold block my-3 text-md" for="description">News Description</label>
				<textarea class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none"  name="description" id="description" placeholder="Event Description"></textarea>
            </div>
				<div>
					<label class="text-gray-800 font-semibold block my-3 text-md" for="imp_path">News Image</label>
					<input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="file" name="img_path" accept="image/*" />
      </div>
	
					
            <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Add News Item</button>
		</form>
	</div>
</div>
<?php 
    include '../../partials/Footer.php'; 
?>