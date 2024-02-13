<?php
include '../../config/dbConfig.php';
include '../../partials/header.php';
include '../../partials/navigation.php';
$admin = $_SESSION['admin'];
$news = $conn->prepare("SELECT
news_id,
title,
description,
img_path

from news
");
$news->execute();
$news->store_result();
$news->bind_result($newsId, $title, $description, $img);
?>
<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

<!-- ====== Cards Section Start -->
<section class="pt-20 lg:pt-[20px] pb-10 lg:pb-20 bg-[#F3F4F6]">
   <div class="container items-center flex flex-col">
    <?php if($admin == 1) : ?>
      <button onclick="window.location.href='addNews'" class="mb-10 bg-blue-500 w-fit hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Add News
    </button>
    <?php endif ?>
      <div class="flex flex-wrap -mx-4">
        
        <!-- repeating card -->
        <?php while ($news->fetch()): ?>
         <div class="w-full md:w-1/2 xl:w-1/3 px-4">
            <div class="bg-white rounded-lg overflow-hidden mb-10">
               <img
                  src="<?= BASE_PATH ?>assets/images/news/<?= $img ?>"
                  alt="image"
                  class="w-full"
                  />
               <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                  <h3>
                     <a
                        href="javascript:void(0)"
                        class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        "
                        >
                     <?= $title ?>
                     </a>
                  </h3>
                  <p class="text-base text-body-color leading-relaxed mb-7">
                  <?= $description ?>
                  </p>
                  <?php if($admin == 1) : ?>
                  <button
                     href="javascript:void(0)"
                     class="
                     inline-block
                     py-2_
                     px-7_
                     bord_er border-[#E5E7EB]
                     roun_ded-full
                     text_-base text-body-color
                     font_-medium
                     hove_r:border-primary hover:bg-primary hover:text-white
                     tran_sition
                     "_
                     >
                  Edit
        </button>
        <?php endif ?>
               </div>
            </div>
         </div>
         <?php endwhile ?>
         
      </div>
   </div>
</section>
<!-- ====== Cards Section End -->
<?php
    include '../../partials/footer.php';
?>